<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    // mostra a pagina de editar GET
    public function edit(Product $product){
        return view('admin.product_edit', [
            'product' => $product
        ]);
    }

    // recebe a requisição para dar o update PUT
    public function update(Product $product, Request $request){
        // dd($product);
        
        $input = $request->validate([
            'title' => 'string|required',
            'price' => 'string|required',
            'stock' => 'integer|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable'
        ]);

        $input['slug'] = Str::slug($input['title']);

        if(!empty($input['cover']) && $input['cover']->isValid()){
            !is_null($product->cover) && Storage::delete($product->cover);
            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }


        $product->fill($input);
        $product->save();
        return Redirect::route('admin.products');
    }

    // mostra a pagina de criar GET
    public function create(){
        return view('admin.product_create');
    }

    // recebe a requisição para criar POST
    public function store(Request $request){
        $input = $request->validate([
            'title' => 'string|required',
            'price' => 'string|required',
            'stock' => 'integer|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable'
        ]);

        $input['slug'] = Str::slug($input['title']);

        if(!empty($input['cover']) && $input['cover']->isValid()){

            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;

            // dd($input['cover']);
        }

        Product::create($input);

        return Redirect::route('admin.products');
    }

    public function destroy(Product $product){
        $product->delete();
        Storage::delete($product->cover ?? '');

        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $product){
        Storage::delete($product->cover ?? '');
        
        $product->cover = null;
        $product->save();

        return Redirect::back();
    }
    
}
