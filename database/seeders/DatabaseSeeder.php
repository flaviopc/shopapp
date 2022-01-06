<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(100)->create();
        $tags = $tags->modelKeys();
        $products = Product::factory(50)->create();
        foreach ($products as $product) {
            $rand = rand(1, 3);
            $val = array();
            for ($i = 0; $i < $rand; $i++) {
                $v = \rand(0, 99);
                $val[] = $tags[$v];
            }

            $product->tags()->sync($val);
        }
        // \App\Models\User::factory(10)->create();
    }
}
