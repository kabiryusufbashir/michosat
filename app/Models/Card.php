<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'pin',
        'application_year',
        'time_generated',
    ];

    public function cardGenerated($card)
    {
        if($card){
            $count = Card::where('time_generated', $card)->count();
            return $count;
        }else{
            return '';
        }
        

    }
}
