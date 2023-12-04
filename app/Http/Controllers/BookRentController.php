<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookRentController extends Controller
{
    public function index(){
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent',['users' => $users, 'books' => $books]);
    }
    
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stock'){
            Session::flash('message', 'Cannot rent, the book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }
        else{
            if ($count >= 3) {
                Session::flash('message', 'cannot rent, user has reach limit of book');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
            else{
                try {
                DB::beginTransaction();
                // process insert to rent_logs table
                RentLogs::create($request->all());
                // process update book table
                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save;
                DB::commit();

                Session::flash('message', 'Rent book success!!!');
                Session::flash('alert-class', 'alert-success');
                return redirect('book-rent');
            } catch (\Throwable $th) {
                DB::roolBack();
                dd($th);
            }
            }
            
        }
    }
}
