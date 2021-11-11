<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        DB::table('participants')->insert([
            'name' => 'Kevin',
            'age' => 10,
            'address' => 'PHL',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
