<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [
        'member_id',
        'book_id',
        'added_at'
    ];

    use HasFactory;
}
