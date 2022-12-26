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
        'state',
        'address',
        'photo',
        'programme',
    ];
}
