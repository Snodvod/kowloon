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
            'name' => 'dogs',
            'image' => 'dog.png'
        ]);
        \App\Category::create([
            'name' => 'cats',
            'image' => 'cat.png'
        ]);
        \App\Category::create([
            'name' => 'fish',
            'image' => 'fish.png'
        ]);
        \App\Category::create([
            'name' => 'birds',
            'image' => 'bird.png'
        ]);
        \App\Category::create([
            'name' => 'small animals',
            'image' => 'hamster.png'
        ]);
        \App\Category::create([
            'name' => 'other',
            'image' => 'add.svg'
        ]);
    }
}
