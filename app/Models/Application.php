<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Application extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'year',
    ];

    public function checkPayment()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $check_payment_session = Applicationreceipt::where('email', $applicant_email)->count();

        return $check_payment_session;

    }

    
    public function checkPaymentStatus()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $payment = Applicationreceipt::where('email', $applicant_email)->first();
        $payment_status = $payment->status;

        if($payment_status == ''){
            return 'Not Paid';
        }else if($payment_status == 1){
            return 'Processing';
        }else if($payment_status == 2){
            return 'Paid';
        }else if($payment_status == 3){
            return 'Rejected';
        }

    }
}
