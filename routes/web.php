<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
	$router->get('participants',  ['uses' => 'ParticipantController@showAllParticipants']);
	$router->get('participant/{id}', ['uses' => 'ParticipantController@showParticipant']);
	$router->post('participant/add', ['uses' => 'ParticipantController@addNewParticipant']);
	$router->delete('participant/remove/{id}', ['uses' => 'ParticipantController@removeParticipant']);
	$router->patch('participant/{id}/{action:increment|decrement}', ['uses' => 'ParticipantController@updateParticipantPoint']);
});
