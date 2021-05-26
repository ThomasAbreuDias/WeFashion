<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['name' => 'men']);
        \App\Models\Category::create(['name' => 'weman']);

        \App\Models\Product::factory(60)->create()->each(function($product) {
            $category = \App\Models\Category::find(rand(1, 2));
            $product->category()->associate($category);
            $product->save();

            $link = Str::random(12) . '.jpg'; // hash de lien pour la sécurité (injection de scripts protection)

            $sub_folder = $category->id === 1 ? 'hommes' : 'femmes';
            $file = Storage::allFiles($sub_folder);

            $randomFile = $file[rand(0, count($file) - 1)];



            $product->picture()->create([
                'title' => 'Default', // valeur par défaut
                'link' => $randomFile
            ]);

            //association des tailles
            $nbSizes = \App\Models\Size::all()->count();
            $product->sizes()->attach(rand(1, $nbSizes));
        });
    }
}
