<?php

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            \App\Faq::create([
                'question' => $faker->realText($maxNbChars = 40) . '?',
                'answer' => $faker->realText($maxNbChars = 300),
                'product_id' => rand(1,8)
            ]);
        }
    }
}
