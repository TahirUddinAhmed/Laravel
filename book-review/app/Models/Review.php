<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    /**
     * Review belongs to a book
     *
     * @return void
     */
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
