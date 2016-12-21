<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'name' => 'Cooling mat',
            'price' => 29.99,
            'image' => 'hot.jpg',
            'category_id' => 1
        ]);
        \App\Product::create([
            'name' => 'Prestige snack',
            'image' => 'parkiet.jpg',
            'price' => 1.99,
            'category_id' => 4
        ]);
        \App\Product::create([
            'name' => 'Houten lamellenbal',
            'price' => 3.05,
            'image' => 'bal.jpg',
            'category_id' => 5
        ]);
        \App\Product::create([
            'name' => 'Juwel Aquarium',
            'price' => 759.99,
            'image' => 'aqua.jpg',
            'category_id' => 3
        ]);
        \App\Product::create([
            'name' => 'Coco husk',
            'price' => 2.19,
            'image' => 'coco.jpg',
            'category_id' => 6
        ]);
        \App\Product::create([
            'name' => 'Poezentoyz',
            'price' => 69.07,
            'image' => 'poes.jpg',
            'category_id' => 2
        ]);
    }
}
