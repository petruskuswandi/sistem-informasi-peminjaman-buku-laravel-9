<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RentLogs extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'user_id', 'rent_date', 'return_date'
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'rent_logs', 'user_id', 'book_id')->withPivot('status');
    }
}
