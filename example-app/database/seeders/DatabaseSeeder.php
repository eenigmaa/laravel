<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     
Seed the application's database.*
@return void*/
public function run(){$faker = Faker::create();

    for ($i = 0; $i < 200; $i++) {
        Client::create([
            'name' => $faker->name,
            'surname' => $faker->name,
            'e-mail' => $faker->email,
            'phone' => $faker->email,

        ]);
    }
    }
}