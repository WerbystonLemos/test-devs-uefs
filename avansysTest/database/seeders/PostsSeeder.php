<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        for($i=1; $i<=10; $i++)
        {
            DB::table('posts')->insert([
                'id'            => $i,
                'title'         => $fake->sentence,
                'user_id'       => $fake->numberBetween(1, 10),
                'tag_id'        => $fake->numberBetween(1, 10),
                'content'       => $fake->paragraph,
                'created_at'    => $fake->date('Y-m-d H:i:s'),
                'updated_at'    => $fake->date('Y-m-d H:i:s'),
            ]);
        }
    }
}
