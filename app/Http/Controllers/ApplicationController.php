<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Application;
use App\Models\Applicationreceipt;
use App\Models\Programme;

class ApplicationController extends Controller
{
    public function applyNow(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'email' => 'required|',
            'old_password' => ['required'],
        ]);
        
        $full_name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->old_password);

        try{
            $check_record = Application::where('email', $email)->count();

            if($check_record == 0){
                
                $name = Application::create([
                    'name' => $full_name,
                    'email' => $email,
                    'password' => $password,
                    'year' => '2022/2023',
                ]);
                
                try{
                    if(Auth::guard('application')->attempt(['email' => $email, 'password' => $request->old_password])){
                        try{
                            $request->session()->regenerate();
                            return redirect()->route('application-dashboard');
                        }catch(Exception $e){
                            return back()->with('error', $e->getMessage());            
                        }
                    }else{
                        return back()->with('error', 'Incorrect Login Credentials');
                    }
                }catch(Exception $e){
                    return back()->with('error', $e->getMessage());
                }
            
            }else{
                return redirect()->route('apply')->with('error', $email.' Already Exists');
            }
        }catch(Exception $e){
            return redirect()->route('apply')->with('error', 'Please try again... '.$e);
        }
    }

    public function applicationLogin(){
        return view('applicationlogin');
    }

    public function applyNowLogin(Request $request){
        $data = $request->validate([
            'email' => 'required|',
            'old_password' => ['required'],
        ]);

        try{
            if(Auth::guard('application')->attempt(['email' => $request->email, 'password' => $request->old_password])){
                try{
                    $request->session()->regenerate();
                    return redirect()->route('application-dashboard');
                }catch(Exception $e){
                    return back()->with('error', $e->getMessage());            
                }
            }else{
                return back()->with('error', 'Incorrect Login Credentials');
            }
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function dashboard(){

        $programmes = Programme::orderby('name', 'asc')->get();
        $email = Auth::guard('application')->user()->email;

        $check_record = Applicationreceipt::where('email', $email)->first();

        if(!empty($check_record)){
            $payment_status = $check_record->status;
            if($payment_status == 0){
                $page_title = 'payment';
            }else if($payment_status == 1){
                $page_title = 'dashboard';
            }else if($payment_status == 2){
                $page_title = 'document';
            }
        }else{
            $page_title = 'dashboard';
        }

        

        return view('application.index', compact('page_title', 'programmes'));
    }

    public function applicationPaymentReceipt(Request $request){
        $data = $request->validate([
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        $receipt = $request->receipt;

        $receiptimageName = '/images/payment/application/.'.$request->receipt->extension();  

        try{

            $session = Applicationreceipt::create([
                'email'=> $applicant_email,
                'receipt'=> $receiptimageName,
                'amount'=> '4000',
                'year'=> '2022/2023',
                'status'=> 1,
            ]);
            
            $request->receipt->move('images/payment/application', $receiptimageName);
                 
            return redirect()->route('application-dashboard')->with('success', 'Payment Submitted');
        
        }catch(Exception $e){
            return redirect()->route('application-dashboard')->with('error', 'Please try again... '.$e);
        }        
    }

    public function applicationLogout(Request $request)
    {   
        Auth::guard('application')->logout();
        return redirect()->route('front');
    }
}
