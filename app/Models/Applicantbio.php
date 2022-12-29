<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantbio extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_email',
        'gender',
        'dob',
        'marital_status',
        'phone',
        'address',
        'city',
        'lga',
        'state',
        'country',
        'kin_name',
        'kin_relation',
        'kin_phone',
        'kin_address',
        'kin_city',
        'kin_lga',
        'kin_state',
        'kin_country',
        'photo',
        'programme',
        'year',
        'applicant_a_level_result'
    ];

    
    public function programme($id)
    {
        if($id != 0){
            $programme = Programme::where('id', $id)->first(); 
            if($programme){
                return $programme->name;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    
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
