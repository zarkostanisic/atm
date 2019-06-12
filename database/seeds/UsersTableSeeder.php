<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'admin',
        	'username' => 'Admin1',
        	'pin' => bcrypt('1234'),
        	'role_id' => 1
        ]);

        User::create([
        	'name' => 'user',
        	'username' => 'User12',
        	'pin' => bcrypt('4321'),
        	'balance' => '50000',
        	'role_id' => 2,
        ]);
    }
}
