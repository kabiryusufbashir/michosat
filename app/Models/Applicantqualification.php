<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantqualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_email',
        'school',
        'grade',
        'cgpa',
        'certificate',
        'year',
    ];

}
