<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $so_user = 10;
        for ($us = 0; $us < $so_user; $us++) {
            $user = User::create([
                'username' => 'US_000_' . $us,
                'fullname' => 'FUll_000_' . $us,
                'email' => 'Email_'.$us,
                'email_verified_at' => now(),
                'password' => 'PW'.$us,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
