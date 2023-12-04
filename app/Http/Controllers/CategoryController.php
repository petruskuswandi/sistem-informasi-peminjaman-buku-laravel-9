<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("layouts.category", ["categories" => $categories]);
    }
    public function add()
    {

        return view("layouts.category-add");
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:categories|max:255']);
        $category = Category::create($request->all());
        return redirect("/category")->with("status", "Category Added Succesfully");
    }
    public function edit($slug)
    {
        $category = Category::where("slug", $slug)->first();
        return view("layouts.category-edit", ["category" => $category]);
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $validated = $request->validate(['name' => 'required|unique:categories|max:255']);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect("/category")->with("status", "Category Updated Succesfully");
    }

    public function delete($slug)
    {
        $category = Category::where("slug", $slug)->first();
        return view("layouts.category-delete", ["category" => $category]);
    }

    public function destroy($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $category->delete();
        return redirect("/category")->with("deleteStatus", "Category Deleted Succesfully");
    }
}
