<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
            for($i=0; $i <= 10000; $i++) {
                $user = User::create([
                    'name' => $faker->unique()->name,
                    'email' => strtolower(str_replace(' ', '', $faker->unique()->name)).'@up.vote',
                    'kelas_id' => 1,
                    'has_voted' => 0,
                    'password' => Hash::make('password'),
                ]);
                $user->attachRole('participant');
            }
    }
}
