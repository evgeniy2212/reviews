<?php

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
        DB::table('users')->insert([
            'name' => 'User',
            'last_name' => 'Userov',
            'email' => 'user@gmail.com',
            'nickname' => 'blade',
            'city' => 'Denver',
            'state' => 'NY',
            'zip_code' => 12345,
            'is_admin' => 0,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('123321123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
