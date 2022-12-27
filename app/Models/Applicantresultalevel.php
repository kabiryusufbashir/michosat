<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicantresultalevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_email',
        'subject',
        'grade',
    ];
}
