<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = [
        'member_id',
        'transaction_id',
        'amount',
        'paid_at'
    ];

    use HasFactory;
}
