<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $req)
    {
        $categories = Category::all();
        $booksQuery = Book::query();

        if ($req->has('category') && $req->has('title')) {
            // Jika kedua parameter category dan title diisi
            $booksQuery->where('title', 'LIKE', '%' . $req->title . '%')
                ->whereHas('categories', function ($q) use ($req) {
                    $q->where('categories.id', $req->category);
                });
        } elseif ($req->has('category')) {
            // Jika hanya parameter category diisi
            $booksQuery->whereHas('categories', function ($q) use ($req) {
                $q->where('categories.id', $req->category);
            });
        } elseif ($req->has('title')) {
            // Jika hanya parameter title diisi
            $booksQuery->where('title', 'LIKE', '%' . $req->title . '%');
        }

        $books = $booksQuery->get();

        return view('pages.book-list', ['books' => $books, 'categories' => $categories]);
    }
}
