<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\Models\Participant;

class LeaderboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccessfulParticipantAddition()
    {
        $this->withoutEvents();

        $payload = [
            'name' => 'John Doe',
            'age' => 32,
            'address' => 'nowhere',
        ];

        $this->json('POST', 'api/participant/add', $payload);
        $this->seeInDatabase('participants', $payload);
    }

    public function testParticipantPointIncrement()
    {
        $this->json('PATCH', 'api/participant/1/increment')
        ->seeJsonEquals(Participant::find(1)->first('points')->toArray());   
    }

    public function testParticipantPointDecrement()
    {
        $this->json('PATCH', 'api/participant/1/decrement')
        ->seeJsonEquals(Participant::find(1)->first('points')->toArray());   
    }

    public function testRemoveParticipant()
    {
        $participant_id = Participant::firstOrFail()->where('name', 'John Doe')->value('id');
        $response = $this->call('DELETE', "api/participant/remove/{$participant_id}");

        $this->assertEquals('Removed Successfully', $response->getContent());
    }
}
