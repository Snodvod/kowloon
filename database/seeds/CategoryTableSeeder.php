<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Dogs'
        ]);
        \App\Category::create([
            'name' => 'Cats'
        ]);
        \App\Category::create([
            'name' => 'Fish'
        ]);
        \App\Category::create([
            'name' => 'Birds'
        ]);
        \App\Category::create([
            'name' => 'Small Animals'
        ]);
        \App\Category::create([
            'name' => 'Other'
        ]);
    }
}
