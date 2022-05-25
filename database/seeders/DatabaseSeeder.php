<?php

namespace Database\Seeders;

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
        DB::table('genres')->insert([
            'id' => 1,
            'name' => 'fantasy',
            'description' => 'Fantasy films are films that belong to the fantasy genre with fantastic themes, usually magic, supernatural events, mythology, folklore, or exotic fantasy worlds.',
        ]);;
        DB::table('genres')->insert([
            'id' => 2,
            'name' => 'horror',
            'description' => 'Horror films may incorporate incidents of physical violence and psychological terror.',
        ]);;
        DB::table('genres')->insert([
            'id' => 3,
            'name' => 'comedy',
            'description' => 'A comedy film is a category of film which emphasizes humor.',
        ]);;
        DB::table('videos')->insert([
            'name' => 'How to train your dragon',
            'description' => 'How to train your dragon trailer video',
            'active' => True,
            'link' => 'https://youtu.be/2AKsAxrhqgM',
            'genre_id' => 1,
        ]);;
        DB::table('videos')->insert([
            'name' => 'Paranormal Activity',
            'description' => 'Paranormal Activity trailer',
            'active' => True,
            'link' => 'https://youtu.be/F_UxLEqd074',
            'genre_id' => 2,
        ]);;
        DB::table('videos')->insert([
            'name' => 'Kung Fu Padna',
            'description' => 'Kung Fu Padna trailer',
            'active' => True,
            'link' => 'https://youtu.be/PXi3Mv6KMzY',
            'genre_id' => 3,
        ]);;

    }
}
