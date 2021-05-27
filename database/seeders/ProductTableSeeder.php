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

            //images
            $sub_folder_category = $category->id === 1 ? 'hommes' : 'femmes';
            $files = Storage::allFiles($sub_folder_category);      
            $file_name = '/'.$files[rand(0, count($files) - 1)];    
            
            $product->picture()->create([
                'title' => 'Default', // valeur par défaut
                'link' => $file_name
            ]);

            //association des tailles
            $nbSizes = \App\Models\Size::all()->count();
            $product->sizes()->attach(rand(1, $nbSizes));
        });
    }
}
