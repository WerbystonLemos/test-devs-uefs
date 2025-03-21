<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        for($i=1; $i <= 10; $i++)
        {
            DB::table('tags')->insert([
                'id'            => $i,
                'name'          => $fake->word,
                'created_at'    => $fake->date('Y-m-d H:i:s'),
                'updated_at'    => $fake->date('Y-m-d H:i:s'),
            ]);
        }
    }
}
