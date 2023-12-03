<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("layouts.book", ["books" => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view("layouts.book-add", ["categories" => $categories]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '';
        if ($request->file('image') != null) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect("/books")->with("status", "Book Added Succesfully");
    }
    public function edit($slug)
    {
        $book = Book::where("slug", $slug)->first();
        $categories = Category::all();
        return view("layouts.book-edit", ["book" => $book, "categories" => $categories]);
    }
    public function update(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('image')!= null) {
            dd('gambar');
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        $request['cover'] = $newName;

        $book = Book::where("slug", $slug)->first();
        $book->categories()->sync($request->categories);
        $book->update($request->all());
        return redirect("/books")->with("status", "Book Updated Succesfully");
        // // dd($request->all());
        // $validated = $request->validate(['name' => 'required|unique:categories|max:255']);

        // $category = Category::where('slug', $slug)->first();
        // $category->slug = null;
        // $category->update($request->all());
        // return redirect("/category")->with("status", "Category Updated Succesfully");
    }
}
