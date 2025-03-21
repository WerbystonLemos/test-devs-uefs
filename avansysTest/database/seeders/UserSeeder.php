<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        for($i=1; $i <= 10; $i++)
        {
            DB::table('users')->insert([
                'id'            => $i,
                'name'          => $fake->name,
                'email'         => $fake->email,
                'date_birth'    => $fake->date('Y-m-d'),
            ]);
        }
    }
}
