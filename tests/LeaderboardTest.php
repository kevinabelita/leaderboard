<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LeaderboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccessfulParticipantAddition()
    {
        $payload = [
            'name' => 'John Doe',
            'age' => 32,
            'address' => 'nowhere',
        ];

        $this->json('POST', 'api/participant/add', $payload);
        $this->seeInDatabase('participants', $payload);
    }
}
