<?php

use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'admin',
            'email' => 'admin@test.dev',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            'type' => \App\User::ADMIN_TYPE
        ]);
    }
}
