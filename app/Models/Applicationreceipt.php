<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationreceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'receipt',
        'amount',
        'year',
        'status',
    ];

}
