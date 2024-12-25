<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "author",
        "status"
    ];

    protected $dates = [
        'publicationDate'
    ];


}
