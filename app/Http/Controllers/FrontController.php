<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    protected $paginate = 8;

    public function index() {
        $products = Product::published()->paginate($this->paginate);
        return view('front.index', ['products' => $products]);
    }
    
    public function show(int $id) {
        $product = Product::find($id);
        return  view('front.show', ['product' => $product]);
    }
}
