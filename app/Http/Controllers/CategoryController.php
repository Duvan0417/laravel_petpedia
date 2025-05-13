<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.index');


    }

public function show($id)
{
    
    $product = Product::with('category')->findOrFail($id);
    return view('products.show', compact('product'));}

     public function destroy (Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }

    public function edit(Category $category){//Encuentro el Curso

        return view('category.edit',compact('category'));

      }

     //Update
    public function update(Request $request, Category $category){


        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.index');

      }

}
