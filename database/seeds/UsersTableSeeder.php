<?php

use Illuminate\Database\Seeder;
use Furbook\User;

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
        'password' => bcrypt('hunter2'),
        'email' => 'admin@admin.com',
        'is_admin' => true,
      ]);

      User::create([
        'name' => 'scott',
        'password' => bcrypt('tiger'),
        'email' => 'scott@scott.com',
        'is_admin' => false,
      ]);
    }
}
