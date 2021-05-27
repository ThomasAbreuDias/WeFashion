<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){
        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index() {
        $products = Product::published()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }
    public function sales() {
        $products = Product::published()->discounted()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }
    
    public function show(int $id) {
        $product = Product::find($id);
        return  view('front.show', ['product' => $product]);
    }
    public function showProductByCategory(int $id) {
        $fr_categories = [
            'men' => 'hommes',
            'weman' => 'femmes',
        ];
        $category = Category::find($id);
        $products = $category->products()->published()->paginate($this->paginate);
        return  view('front.category', [
            'products' => $products,
            'category' => $category,
            'fr_categories' => $fr_categories,
        ]);
    }
}
