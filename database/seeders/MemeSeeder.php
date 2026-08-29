<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('memes')->insert([
            [
                'category_id' => 1,
                'name' => 'placeholder meme',
                'born_at' => '2020-01-01',
                'died_at' => '2021-06-01',
                'cause_of_death' => 'dipakai emak-emak',
                'skor_viral' => 8,
                'image_url' => null,
            ],
        ]);
    }
}
