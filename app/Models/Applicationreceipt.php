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
        'registered_by',
    ];

    public function dateFormat($date){
        if($date){
            //l : a full textual representation of a day
            //F : a full textual representation of a month
            $date_format = date('g:i a, l d, F Y', strtotime($date));
                return $date_format;
        }else{
            return '';
        }
    }

}
