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
                ['audio' => "http://soundfxcenter.com/movies/jurassic-park/8d82b5_Tyrannosaurus_Rex_Roaring_Sound_Effect.mp3",
                'name' => 'Department 1'],
                ['audio' => "http://soundfxcenter.com/movies/jurassic-park/8d82b5_Tyrannosaurus_Rex_Roaring_Sound_Effect.mp3",
                'name' => 'Department 2'],
                ['audio' => "http://soundfxcenter.com/movies/jurassic-park/8d82b5_Tyrannosaurus_Rex_Roaring_Sound_Effect.mp3",
                'name' => 'Department 3'],
                ['audio' => "http://soundfxcenter.com/movies/jurassic-park/8d82b5_Tyrannosaurus_Rex_Roaring_Sound_Effect.mp3",
                'name' => 'Department 4'],
            ],
        );
        \App\Models\User::factory(10)->create();
        \App\Models\Ticket::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
