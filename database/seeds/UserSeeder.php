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
        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'country' => 'palestine',
            'mobile_number' => '05977777888',
            'mobile_number_country_code' => '123',
            'email'  => 'user@example.com',
            'password' => 'password',
        ]);

        User::create([
            'first_name' => 'user2',
            'last_name' => 'user2',
            'country' => 'palestine',
            'mobile_number' => '05977777688',
            'mobile_number_country_code' => '123',
            'email'  => 'user2@example.com',
            'password' => 'password',
            'type' => '1'
        ]);
    }
}
