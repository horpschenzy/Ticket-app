<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departments")->insertOrIgnore(
            [
                ['audio' => "newvoice.mp3",
                'name' => 'Department 1'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 2'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 3'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 4'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 5'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 6'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 7'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 8'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 9'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 10'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 11'],
                ['audio' => "newvoice.mp3",
                'name' => 'Department 12'],
            ],
        );
        \App\Models\User::factory(10)->create();
        \App\Models\Ticket::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
