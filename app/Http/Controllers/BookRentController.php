<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('pages.book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $req)
    {
        $unavailableBooks = [];

        $req->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|array',
            'book_id.*' => 'exists:books,id',
        ]);

        $req['rent_date'] = now()->toDateString();
        $req['return_date'] = now()->addDay(3)->toDateString();

        try {
            DB::beginTransaction();

            foreach ($req->book_id as $bookId) {
                $book = Book::findOrFail($bookId);

                if ($book->status != 'in stock') {
                    $unavailableBooks[] = $book->title;
                }
            }

            if (!empty($unavailableBooks)) {
                $errorMessage = 'Cannot rent, the following books are unavailable: ' . implode(', ', $unavailableBooks);
                Session::flash('message', $errorMessage);
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }

            $rentLogsData = [];
            foreach ($req->book_id as $bookId) {
                $rentLogsData[] = [
                    'user_id' => $req['user_id'],
                    'book_id' => $bookId,
                    'rent_date' => $req['rent_date'],
                    'return_date' => $req['return_date'],
                ];
            }

            RentLogs::insert($rentLogsData);

            DB::commit();

            Session::flash('message', 'Books rented successfully.');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-rent');
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('message', 'An error occurred. Please try again.');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }
    }
}
