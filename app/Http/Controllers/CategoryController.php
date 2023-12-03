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
        $category = Category::create($request->all());
        return redirect("/category");
    }
}
