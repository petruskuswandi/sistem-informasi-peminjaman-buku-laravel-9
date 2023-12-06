<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('pages.category-add');
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::create($req->all());

        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('pages.category-edit', ['category' => $category]);
    }

    public function update(Request $req, $slug)
    {
        $validated = $req->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($req->all());

        return redirect('categories')->with('status', 'Category Updated Successfully');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('pages.category-delete', ['category' => $category]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('pages.category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Successfully');
    }
}
