<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::paginate(10);
        return view("product.index", compact("products"));
    }

    public function show(Product $product){

        return view("product.show", compact("product"));
    }

    public function create(Request $request){

        return view("product.create");
    }

    public function store(Request $request){

    }
    public function edit(Request $request, Product $product){

        return view("product.edit", compact("product"));
    }


    public function update(Request $request, Product $product){

        return redirect()->route("products.index");
    }

    public function destroy(Product $product){

        $product->delete();
    }
}
