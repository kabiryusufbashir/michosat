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

    public function checkApplicationProgress()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $check_payment_session = Applicationreceipt::where('email', $applicant_email)->first();

        if(!empty($check_payment_session)){
            $check_payment_session_status = $check_payment_session->status;
            if($check_payment_session_status == 2){
                return 1;
            }else if($check_payment_session_status == 4){
                return 2;
            }else if($check_payment_session_status == 5){
                return 3;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    public function checkPaymentStatus()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $payment = Applicationreceipt::where('email', $applicant_email)->first();
        
        if(!empty($payment)){
            $payment_status = $payment->status;
    
            if($payment_status == 0 || $payment_status == ''){
                return 'Not Paid';
            }else if($payment_status == 1){
                return 'Processing';
            }else if($payment_status == 2){
                return 'Paid';
            }else if($payment_status == 3){
                return 'Rejected';
            }else{
                return 'Paid';
            }
        }else{
            return 'Not Paid';
        }

    }

    public function checkRegistrationStatus()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $payment = Applicationreceipt::where('email', $applicant_email)->first();
        
        if(!empty($payment)){
            $payment_status = $payment->status;
    
            if($payment_status <= 3){
                return 'Not Completed';
            }else if($payment_status >= 4){
                return 'Application Completed';
            }else{
                return 'Not Completed';
            }
        }else{
            return 'Not Completed';
        }

    }

    public function applicantPaymentStatus($email)
    {
        $payment = Applicationreceipt::where('email', $email)->first();
        
        if(!empty($payment)){
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
        }else{
            return 'Not Paid';
        }
    }

    public function applicantAdmissionStatus()
    {
        $applicant_email = Auth::guard('application')->user()->email;
        
        $payment = Applicationreceipt::where('email', $applicant_email)->first();
        
        if(!empty($payment)){
            $payment_status = $payment->status;
    
            if($payment_status == 5){
                return 'Admitted';
            }else{
                return 'Not Yet!';
            }
        }else{
            return 'Not Yet!';
        }
    }

}
