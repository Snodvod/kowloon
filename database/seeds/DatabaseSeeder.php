<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(FaqTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ImageTableSeeder::class);
    }
}
