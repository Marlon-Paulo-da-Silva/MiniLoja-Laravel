<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    // mostra a pagina de editar GET
    public function edit(){
        return view('admin.product_edit');
    }

    // recebe a requisição para dar o update PUT
    public function update(){
        return view('admin.product_edit');
    }

    // mostra a pagina de criar GET
    public function create(){
        return view('admin.product_create');
    }

    // recebe a requisição para criar POST
    public function store(){
        return view('admin.product_create');
    }
    
}
