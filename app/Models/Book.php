<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable= [
        'title',
        'author',
        'ISBN',
        'genre',
        'publicationYear',
        'description',
        'shelfLocation',
        'status'
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
