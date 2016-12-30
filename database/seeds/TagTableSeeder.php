<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
            'name' => 'new'
        ]);
        \App\Tag::create([
            'name' => 'luxury'
        ]);
        \App\Tag::create([
            'name' => 'other'
        ]);
        \App\Tag::create([
            'name' => 'fun'
        ]);
        \App\Tag::create([
            'name' => 'sale'
        ]);
    }
}
