<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    protected $paginate = 8;
    
    protected $validate_rules = [
        "name" => "required|string|max:100",
        "description" => "required|string",
        "price" => "required|digits_between:0.00,99999999.99|",//pour decimal(8,2)
        "reference" => "required|alpha_num|max:16",
        "category_id" => "required|integer",
        "sizes.*" => "string",
        "status" => "in:published, unpublished",
        "discounted" => "boolean|nullable",
        "title_img" => "string|nullable",
        "picture" => "image|max:3000",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);
    
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $sizes = Size::getTableColumns();
        return view('back.product.create', ['categories' => $categories, 'sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->validate_rules);
        $product = Product::create($request->all());
        $form_sizes_val = Size::fromFormToDb($request->sizes);
        $sizes = Size::create($form_sizes_val);
        $product->sizes()->attach($sizes);
        $picture = $request->file('picture');

        if(!empty($img)){
            $link = $request->file('picture')->store('images');
            $product->picture()->create([
                'link' => $link,
                'title' => $request->title_img ?? $request->title
            ]);
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('back.product.show', [
            'product' => $product,
            'sizes' => $product->getSizesArray()  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('back.product.edit', [
            'product' => $product,
            'sizes' => $product->getSizesArray(),
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        $sizes = Size::find($request->sizes_id);
        $form_sizes_val = Size::fromFormToDb($request->sizes);
        $sizes->update($form_sizes_val);


        $img = $request->file('picture');
        $title_img = $request->title_img; 
        
        // partis buger  
        if (!empty($img)) {
            $link = $request->file('picture')->store('images');
            // suppression de l'image si elle existe 
            if($product->picture->size > 0){
                Storage::disk('local')->delete($product->picture->link); // supprimer physiquement l'image
                $product->picture()->delete(); // supprimer l'information en base de données
            }

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->picture()->create([
                'link' => $link,
                'title' => $title_img?? $request->title
            ]);
            
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
        // ->with('message', 'success delete');
    }
}
