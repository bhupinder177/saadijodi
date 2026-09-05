<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'firstName' => 'Admin',
                'lastName' => 'Admin',
                'phone' => '0000000000',
                'password' => bcrypt('admin@123'),
                'type' => 1,
                'status' => 1,
            ]
        );
    }
}
