<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker      = Factory::create();
        $batchSize  = 50;
        $totalUsers = 500;

        foreach (range(1, $totalUsers / $batchSize) as $batch) {

            $users = collect()->times($batchSize, function () use ($faker) {
                return [
                    'name'           => $faker->name,
                    'email'          => $faker->unique()->safeEmail,
                    'phone_number'   => substr($faker->phoneNumber, 0, 15),
                    'dob'            => $faker->date(),
                    'user_type'      => $faker->randomElement(['Customer', 'Admin']),
                    'user_picture'   => 'uploads/default.jpg',
                    'password'       => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ];
            });


            foreach ($users as $userData) {
                User::create($userData);
            }
        }
    }
}
