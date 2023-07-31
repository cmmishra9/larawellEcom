<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }

    public function create(Request $request){

        return view("category.create");
    }

    public function store(Request $request){

    }
    public function edit(Request $request, Category $category){

        return view("category.edit", compact("category"));
    }


    public function update(Request $request, Category $category){

        return redirect()->route("products.index");
    }

    public function destroy(Category $category){

        $category->delete();
    }
}
