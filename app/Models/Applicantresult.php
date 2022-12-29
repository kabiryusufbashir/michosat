<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantresult extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_type',
        'exam_no',
        'exam_year',
        'exam_center',
        'sitting',
        'applicant_email',
        'subject',
        'grade',
    ];
}
