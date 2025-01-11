<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'book_id',
        'newspaper_id',
        'magazine_id',
        'member_id',
        'transaction_date',
        'due_date',
        'return_date',
    ];

    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function newspaper()
    {
        return $this->belongsTo(NewsPaper::class);
    }

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class);
    }

}
