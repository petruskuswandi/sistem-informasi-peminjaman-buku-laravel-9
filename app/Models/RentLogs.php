<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    /**
     * Get the user that owns the RentLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user that owns the RentLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}