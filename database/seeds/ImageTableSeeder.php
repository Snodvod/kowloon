<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Image::create([
            'image' => 'hot.jpg',
            'product_id' => 1
        ]);
        \App\Image::create([
            'image' => 'parkiet.jpg',
            'product_id' => 2
        ]);
        \App\Image::create([
            'image' => 'bal.jpg',
            'product_id' => 3
        ]);
        \App\Image::create([
            'image' => 'aqua.jpg',
            'product_id' => 4
        ]);
        \App\Image::create([
            'image' => 'coco.jpg',
            'product_id' => 5
        ]);
        \App\Image::create([
            'image' => 'poes.jpg',
            'product_id' => 6
        ]);

    }
}
