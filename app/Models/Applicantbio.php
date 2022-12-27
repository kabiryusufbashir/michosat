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
    ];
}
