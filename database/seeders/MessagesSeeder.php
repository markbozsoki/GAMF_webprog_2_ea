<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessagesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('messages')->insert([
                'timestamp' => $faker->dateTimeThisYear,
                'email' => $faker->safeEmail,
                'subject' => $faker->sentence(3),
                'message' => $faker->paragraph,
            ]);
        }
    }
}
