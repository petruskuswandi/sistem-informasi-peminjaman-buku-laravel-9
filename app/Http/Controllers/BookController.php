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

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        $selectedCategories = $book->categories->pluck('id')->toArray();
        return view('pages.book-edit', ['book' => $book, 'categories' => $categories, 'selectedCategories' => $selectedCategories]);
    }

    public function update(Request $req, $slug)
    {
        if ($req->file('image')) {
            $extension = $req->file('image')->getClientOriginalExtension();
            $newName = $req->title . '-' . now()->timestamp . '.' . $extension;
            $req->file('image')->storeAs('cover', $newName);
            $req['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($req->all());

        if ($req->categories) {
            $book->categories()->sync($req->categories);
        }

        return redirect('books')->with('status', 'Book Updated Successfully');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('pages.book-delete', ['book' => $book]);
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }

    public function deletedBook()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('pages.book-deleted-list', ['deletedBooks' => $deletedBooks]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successfully');
    }
}
