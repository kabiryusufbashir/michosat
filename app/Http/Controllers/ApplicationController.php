<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Application;
use App\Models\Applicationreceipt;
use App\Models\Programme;
use App\Models\Applicantresult;
use App\Models\Applicantbio;

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
            }else if($payment_status == 4){
                $page_title = 'slip';
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

    public function applicationRegistrationForm(Request $request){
        $data = $request->validate([
            'gender' => ['required'],
            'dob' => ['required'],
            'marital_status' => ['required'],
            'phone' => ['required'],
            'state' => ['required'],
            'address' => ['required'],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'programme' => ['required'],
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        $photo = $request->photo;
        $imageName = '/images/application/applicant/.'.$request->photo->extension();  

        try{
         
            $applicant = Applicantbio::create([
                'applicant_email' => $applicant_email,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
                'phone' => $request->phone,
                'state' => $request->state,
                'address' => $request->address,
                'photo' => $imageName,
                'programme' => $request->programme,
            ]);

            $request->photo->move('images/application/applicant', $imageName);
            
            // Add Result 
            $data = Array(
                'subject_name' => $request->subject_name,
                'subject_grade' => $request->subject_grade,
            );

            try{

                $check_record = Applicantresult::where('applicant_email', $applicant_email)->count();
                
                if($check_record == 0){
                    if($result = $data['subject_name']){
                        for($x=0; $x<count($result); $x++){
                            $result_add = new Applicantresult;
                            $result_add['applicant_email'] = $applicant_email;
                            $result_add['subject'] = $data['subject_name'][$x];
                            $result_add['grade'] = $data['subject_grade'][$x];
                            $result_add->save();
                        }
                    }
                }else{
                    $delete_previous_record = Applicantresult::where('applicant_email', $applicant_email)->delete();
                    if($result = $data['subject_name']){
                        for($x=0; $x<count($result); $x++){
                            $result_add = new Applicationresult;
                            $result_add['applicant_email'] = $applicant_email;
                            $result_add['subject'] = $data['subject_name'][$x];
                            $result_add['grade'] = $data['subject_grade'][$x];
                            $result_add->save();
                        }
                    }
                }

                //Update Logic
                try{
                    $registration = Applicationreceipt::where('email', $applicant_email)->update([
                        'status' => 4,
                    ]);
                    
                    return back()->with('success', 'Application Submitted');
        
                }catch(Exception $e){
                    return back()->with('error', 'Please try again... '.$e);
                }

            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
    
        }catch(Exception $e){
            return back->with('error', 'Please try again... '.$e);
        }
    }

    public function applicationLogout(Request $request)
    {   
        Auth::guard('application')->logout();
        return redirect()->route('front');
    }
}
