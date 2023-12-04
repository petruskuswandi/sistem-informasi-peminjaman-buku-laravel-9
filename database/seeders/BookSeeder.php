<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Book::truncate();
        Schema::enableForeignKeyConstraints();

        // Seed data
        $books = [
            [
                'book_code' => 'B001',
                'title' => 'The Great Gatsby',
                'status' => 'available',
            ],
            [
                'book_code' => 'B002',
                'title' => 'To Kill a Mockingbird',
                'status' => 'available',
            ],
            // Add more books as needed
        ];

        // Insert the data into the books table
        DB::table('books')->insert($books);
    }
}
