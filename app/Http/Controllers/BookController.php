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
        return view('pages.book', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('pages.book-add', ['categories' => $categories]);
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '';
        if ($req->file('image')) {
            $extension = $req->file('image')->getClientOriginalExtension();
            $newName = $req->title . '-' . now()->timestamp . '.' . $extension;
            $req->file('image')->storeAs('cover', $newName);
        }

        $req['cover'] = $newName;
        $book = Book::create($req->all());
        $book->categories()->sync($req->categories);
        return redirect('books')->with('status', 'Book Added Successfully');
    }
}
