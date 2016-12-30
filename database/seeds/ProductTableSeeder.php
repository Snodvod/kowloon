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
        $product = \App\Product::create([
            'name' => 'Cooling mat',
            'price' => 29.99,
            'image' => 'hot.jpg',
            'hot' => true,
            'hot_order' => 1,
            'category_id' => 1
        ]);
        $product->tags()->attach(1);
        $product = \App\Product::create([
            'name' => 'Prestige snack',
            'image' => 'parkiet.jpg',
            'price' => 1.99,
            'hot' => true,
            'hot_order' => 2,
            'category_id' => 4
        ]);
        $product->tags()->attach(2);
        $product->tags()->attach(4);
        $product = \App\Product::create([
            'name' => 'Houten lamellenbal',
            'price' => 3.05,
            'image' => 'bal.jpg',
            'hot' => true,
            'hot_order' => 3,
            'category_id' => 5
        ]);
        $product->tags()->attach(3);
        $product = \App\Product::create([
            'name' => 'Juwel Aquarium',
            'price' => 759.99,
            'image' => 'aqua.jpg',
            'hot' => true,
            'hot_order' => 4,
            'category_id' => 3
        ]);
        $product->tags()->attach(1);
        $product->tags()->attach(2);
        $product = \App\Product::create([
            'name' => 'Coco husk',
            'price' => 2.19,
            'image' => 'coco.jpg',
            'category_id' => 6
        ]);
        $product->tags()->attach(2);
        $product->tags()->attach(5);

        $product = \App\Product::create([
            'name' => 'Poezentoyz',
            'price' => 69.07,
            'image' => 'poes.jpg',
            'category_id' => 2
        ]);
        $product->tags()->attach(4);
            $product = \App\Product::create([
                'name' => 'Poezentoyz3',
                'price' => 69.07,
                'image' => 'poes.jpg',
                'category_id' => 2
            ]);
        $product->tags()->attach(5);
            $product = \App\Product::create([
                'name' => 'Poezentoyz2',
                'price' => 69.07,
                'image' => 'poes.jpg',
                'category_id' => 2
            ]);
        $product->tags()->attach(4);
    }
}
