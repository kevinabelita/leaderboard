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
	$router->get('participants',  ['uses' => 'LeaderboardController@showAllParticipants']);
	$router->get('participant/{id}', ['uses' => 'LeaderboardController@showParticipant']);
	$router->post('participant/add', ['uses' => 'LeaderboardController@addNewParticipant']);
	$router->delete('participant/remove/{id}', ['uses' => 'LeaderboardController@removeParticipant']);
	$router->patch('participant/{id}/{action:increment|decrement}', ['uses' => 'LeaderboardController@updateParticipantPoint']);
});
