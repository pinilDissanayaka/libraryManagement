<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPaper extends Model
{
    protected $fillable = [
        'title',
        'publisher',
        'publicationDate',
        'shelfLocation'
    ];

    protected $dates = [
        'publicationDate'
    ];


    use HasFactory;
}
