<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Ino Van Winckel',
            'email' => 'inovanwinckel@hotmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
