<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Application;
use App\Models\Applicationreceipt;
use App\Models\Programme;
use App\Models\Applicantresult;
use App\Models\Applicantresultalevel;
use App\Models\Applicantbio;
use App\Models\Card;
use App\Models\Applicantqualification;

class ApplicationController extends Controller
{
    public function applyNow(Request $request){
        $data = $request->validate([
            'first_name' => ['required'],
            'surname' => ['required'],
            'email' => 'required|',
            'old_password' => ['required'],
        ]);
        
        $full_name = $request->first_name.' '.$request->surname.' '.$request->last_name;
        $email = $request->email;
        $password = Hash::make($request->old_password);
        
        $application_count = Application::count();

        $year = date('y');
        $month = date('m');
        $application_no = 'MICOHSAT'.$year.''.$month.''.$application_count + 1;

        try{
            $check_record = Application::where('email', $email)->count();

            if($check_record == 0){
                
                $name = Application::create([
                    'application_no' => $application_no,
                    'name' => $full_name,
                    'first_name' => $request->first_name,
                    'surname' => $request->surname,
                    'middle_name' => $request->middle_name,
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

    public function applicationPayment(){
        /* API URL */
        $url = 'https://api.zainpay.ng/zainbox/card/initialize/payment';
            
        /* Init cURL resource */
        $ch = curl_init($url);
            
        /* Array Parameter Data */
        $data = [
            'amount'=>'100', 
            'txnRef'=>'miki20230101', 
            'mobileNumber'=>'08068593127', 
            'zainboxCode'=>'_eOUShwgHjnOCVsiglbf0', 
            'emailAddress'=>'kabiryusufbashir@gmail.com', 
            'callBackUrl'=>'https://micohsat.com.ng/application/payment/callback', 
        ];
            
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
        /* set the content type json */
        $headers = [];
        $headers[] = 'Content-Type:application/json';
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3phaW5wYXkubmciLCJpYXQiOjE2NzA4NjQ4MTgsImlkIjpiM2Y4NTQyZC1lMWYyLTRhMzEtOTI4YS1jNGViNGQ1NGU3YWIsIm5hbWUiOm1pY29oc2F0QGdtYWlsLmNvbSwicm9sZSI6bWljb2hzYXRAZ21haWwuY29tLCJzZWNyZXRLZXkiOjhCOGg5UjhtTVBDVnRxMFp2OU9oYXJzejg1MWlnRWFsVlFuaG5KdTZodHVnY30.8GChYMDEzl7NqeZi-wagKy-SV7FyMX2XMW8Uphc7kqA";
        $headers[] = "Authorization: Bearer ".$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
        
        dd($result);
        
        /* close cURL resource */
        curl_close($ch);
    }

    public function applicationPaymentCallBack(){
        dd('Hit');
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
                return redirect()->route('application-registration-bio');
            }else if($payment_status == 4){
                $page_title = 'slip';
            }else if($payment_status == 5){
                $page_title = 'letter';
            }
        }else{
            $page_title = 'dashboard';
        }

        return view('application.index', compact('page_title', 'programmes'));
    }

    public function registrationBio(){
        
        $email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $applicant = Applicantbio::where('applicant_email', $email)->first();

        return view('application.registration.step_1', compact('page_title', 'applicant'));
    
    }

    public function registrationBioSubmit(Request $request){
        $data = $request->validate([
            'gender' => ['required'],
            'dob' => ['required'],
            'marital_status' => ['required'],
            'phone' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'lga' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        
        $check_record = Applicantbio::where('applicant_email', $applicant_email)->count();

        try{
            if($check_record == 0){
                $applicant = Applicantbio::create([
                    'applicant_email' => $applicant_email,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'marital_status' => $request->marital_status,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'lga' => $request->lga,
                    'state' => $request->state,
                    'country' => $request->country,
                ]);

                return redirect()->route('application-registration-photo');

            }else{
                $applicant = Applicantbio::where('applicant_email', $applicant_email)->update([
                    'applicant_email' => $applicant_email,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'marital_status' => $request->marital_status,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'lga' => $request->lga,
                    'state' => $request->state,
                    'country' => $request->country,
                ]);

                return redirect()->route('application-registration-photo');
            }
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }

    }

    public function registrationPhoto(){

        $programmes = Programme::orderby('name', 'asc')->get();
        $email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $applicant = Applicantbio::where('applicant_email', $email)->first();

        return view('application.registration.step_2', compact('page_title', 'programmes', 'applicant'));
    
    }

    public function registrationPhotoSubmit(Request $request){
        $data = $request->validate([
            'programme' => ['required'],
        ]);

        $applicant_email = Auth::guard('application')->user()->email;

        $photo = $request->photo;
        $applicant_name = Auth::guard('application')->user()->name;
        
        if(!empty($photo)){
            $imageName = '/images/application/applicant/'.$applicant_name.'.'.$request->photo->extension();  
        }
        
            try{
                
                if(!empty($photo)){
                    $applicant = Applicantbio::where('applicant_email', $applicant_email)->update([
                        'programme' => $request->programme,
                        'photo' => $imageName,
                    ]);
                }else{
                    $applicant = Applicantbio::where('applicant_email', $applicant_email)->update([
                        'programme' => $request->programme,
                    ]);
                }

                if(!empty($photo)){
                    $request->photo->move('images/application/applicant', $imageName);
                }
                    
                return redirect()->route('application-registration-result');

            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }

    }
 
    public function registrationResult(){

        $programmes = Programme::orderby('name', 'asc')->get();
        $applicant_email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $applicant = Applicantbio::where('applicant_email', $applicant_email)->first();

        $applicant_result_first = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'First')->get();
        $applicant_result_first_type = Applicantresult::select('exam_type')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_type')->first();
        $applicant_result_first_no = Applicantresult::select('exam_no')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_no')->first();
        $applicant_result_first_year = Applicantresult::select('exam_year')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_year')->first();
        $applicant_result_first_center = Applicantresult::select('exam_center')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_center')->first();
        
        $applicant_result_second = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'Second')->get();
        $applicant_result_second_type = Applicantresult::select('exam_type')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_type')->first();
        $applicant_result_second_no = Applicantresult::select('exam_no')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_no')->first();
        $applicant_result_second_year = Applicantresult::select('exam_year')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_year')->first();
        $applicant_result_second_center = Applicantresult::select('exam_center')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_center')->first();
        

        return view('application.registration.step_3', compact(
            'page_title', 'programmes', 'applicant', 
            'applicant_result_first', 'applicant_result_first_type', 'applicant_result_first_no', 'applicant_result_first_year', 'applicant_result_first_center',    
            'applicant_result_second', 'applicant_result_second_type', 'applicant_result_second_no', 'applicant_result_second_year', 'applicant_result_second_center'
        ));
    
    }

    public function registrationResultSubmit(Request $request){
        $applicant_email = Auth::guard('application')->user()->email;

        // Add Result 
        $data = Array(
            'subject_name' => $request->one_subject_name,
            'subject_grade' => $request->one_subject_grade,
        );

        try{
            $check_record = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'First')->count();
            
            if($check_record == 0){
                if($result = $data['subject_name']){
                    for($x=0; $x<count($result); $x++){
                        $result_add = new Applicantresult;
                        $result_add['applicant_email'] = $applicant_email;
                        $result_add['exam_type'] = $request->one_exam_type;
                        $result_add['exam_no'] = $request->one_exam_no;
                        $result_add['exam_year'] = $request->one_exam_year;
                        $result_add['exam_center'] = $request->one_exam_center;
                        $result_add['sitting'] = 'First';
                        $result_add['subject'] = $data['subject_name'][$x];
                        $result_add['grade'] = $data['subject_grade'][$x];
                        $result_add->save();
                    }
                }
            }else{
                $delete_previous_record = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'First')->delete();
                if($result = $data['subject_name']){
                    for($x=0; $x<count($result); $x++){
                        $result_add = new Applicantresult;
                        $result_add['applicant_email'] = $applicant_email;
                        $result_add['exam_type'] = $request->one_exam_type;
                        $result_add['exam_no'] = $request->one_exam_no;
                        $result_add['exam_year'] = $request->one_exam_year;
                        $result_add['exam_center'] = $request->one_exam_center;
                        $result_add['sitting'] = 'First';
                        $result_add['subject'] = $data['subject_name'][$x];
                        $result_add['grade'] = $data['subject_grade'][$x];
                        $result_add->save();
                    }
                }
            }

            if($request->two_exam_type != null){
                // Add Result Two Level 
                $two_data = Array(
                    'two_subject_name' => $request->two_subject_name,
                    'two_subject_grade' => $request->two_subject_grade,        
                );

                $check_record = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'Second')->count();
            
                if($check_record == 0){
                    if($two_result = $two_data['two_subject_name']){
                        for($x=0; $x<count($two_result); $x++){
                            $result_add = new Applicantresult;
                            $result_add['applicant_email'] = $applicant_email;
                            $result_add['exam_type'] = $request->two_exam_type;
                            $result_add['exam_no'] = $request->two_exam_no;
                            $result_add['exam_year'] = $request->two_exam_year;
                            $result_add['exam_center'] = $request->two_exam_center;
                            $result_add['sitting'] = 'Second';
                            $result_add['subject'] = $two_data['two_subject_name'][$x];
                            $result_add['grade'] = $two_data['two_subject_grade'][$x];
                            $result_add->save();
                        }
                    }
                }else{
                    $delete_previous_record = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'Second')->delete();
                    if($two_result = $two_data['two_subject_name']){
                        for($x=0; $x<count($two_result); $x++){
                            $result_add = new Applicantresult;
                            $result_add['applicant_email'] = $applicant_email;
                            $result_add['exam_type'] = $request->two_exam_type;
                            $result_add['exam_no'] = $request->two_exam_no;
                            $result_add['exam_year'] = $request->two_exam_year;
                            $result_add['exam_center'] = $request->two_exam_center;
                            $result_add['sitting'] = 'Second';
                            $result_add['subject'] = $two_data['two_subject_name'][$x];
                            $result_add['grade'] = $two_data['two_subject_grade'][$x];
                            $result_add->save();
                        }
                    }
                }
            }

            return redirect()->route('application-registration-qualification');
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function registrationQualification(){
        $applicant_email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $qualifications = Applicantqualification::where('applicant_email', $applicant_email)->get();

        return view('application.registration.step_4', compact('page_title', 'qualifications'));
    }

    public function registrationQualificationSubmit(Request $request){
        $applicant_email = Auth::guard('application')->user()->email;

        // Add Applicant Qualification 
        $qualification = Array(
            'school' => $request->school,
            'grade' => $request->grade,
            'cgpa' => $request->cgpa,
            'certificate' => $request->certificate,
            'year' => $request->year,        
        );

        $check_record = Applicantqualification::where('applicant_email', $applicant_email)->count();
    
        try{
            if($check_record == 0){
                if($two_result = $qualification['school']){
                    for($x=0; $x<count($two_result); $x++){
                        $result_add = new Applicantqualification;
                        $result_add['applicant_email'] = $applicant_email;
                        $result_add['school'] = $qualification['school'][$x];
                        $result_add['grade'] = $qualification['grade'][$x];
                        $result_add['cgpa'] = $qualification['cgpa'][$x];
                        $result_add['certificate'] = $qualification['certificate'][$x];
                        $result_add['year'] = $qualification['year'][$x];
                        $result_add->save();
                    }
                }
            }else{
                $delete_previous_record = $check_record = Applicantqualification::where('applicant_email', $applicant_email)->delete();
                if($two_result = $qualification['school']){
                    for($x=0; $x<count($two_result); $x++){
                        $result_add = new Applicantqualification;
                        $result_add['applicant_email'] = $applicant_email;
                        $result_add['school'] = $qualification['school'][$x];
                        $result_add['grade'] = $qualification['grade'][$x];
                        $result_add['cgpa'] = $qualification['cgpa'][$x];
                        $result_add['certificate'] = $qualification['certificate'][$x];
                        $result_add['year'] = $qualification['year'][$x];
                        $result_add->save();
                    }
                }
            }

            return redirect()->route('application-registration-kin');
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function registrationKin(){

        $email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $applicant = Applicantbio::where('applicant_email', $email)->first();

        return view('application.registration.step_5', compact('page_title', 'applicant'));
    
    }

    public function registrationKinSubmit(Request $request){
        $data = $request->validate([
            'kin_name' => ['required'],
            'kin_relation' => ['required'],
            'kin_phone' => ['required'],
            'kin_city' => ['required'],
            'kin_address' => ['required'],
            'kin_lga' => ['required'],
            'kin_state' => ['required'],
            'kin_country' => ['required'],
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        
        $check_record = Applicantbio::where('applicant_email', $applicant_email)->count();

        try{
            if($check_record == 0){
                $applicant = Applicantbio::create([
                    'kin_name' => $request->kin_name,
                    'kin_relation' => $request->kin_relation,
                    'kin_phone' => $request->kin_phone,
                    'kin_address' => $request->kin_address,
                    'kin_city' => $request->kin_city,
                    'kin_lga' => $request->kin_lga,
                    'kin_state' => $request->kin_state,
                    'kin_country' => $request->kin_country,
                ]);

                return redirect()->route('application-registration-sponsor');

            }else{
                $applicant = Applicantbio::where('applicant_email', $applicant_email)->update([
                    'kin_name' => $request->kin_name,
                    'kin_relation' => $request->kin_relation,
                    'kin_phone' => $request->kin_phone,
                    'kin_address' => $request->kin_address,
                    'kin_city' => $request->kin_city,
                    'kin_lga' => $request->kin_lga,
                    'kin_state' => $request->kin_state,
                    'kin_country' => $request->kin_country,
                ]);

                return redirect()->route('application-registration-sponsor');
            }
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function registrationSponsor(){

        $email = Auth::guard('application')->user()->email;
        $page_title = 'document';
        $applicant = Applicantbio::where('applicant_email', $email)->first();

        return view('application.registration.step_6', compact('page_title', 'applicant'));
    
    }

    public function registrationSponsorSubmit(Request $request){
        $data = $request->validate([
            'sponsor_name' => ['required'],
            'sponsor_phone' => ['required'],
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        
        $check_record = Applicantbio::where('applicant_email', $applicant_email)->count();

        try{
            if($check_record == 0){
                $applicant = Applicantbio::create([
                    'sponsor_name' => $request->sponsor_name,
                    'sponsor_phone' => $request->sponsor_phone,
                    'year' => '2022/2023',
                ]);

                //Update Logic
                try{
                    $registration = Applicationreceipt::where('email', $applicant_email)->update([
                        'status' => 4,
                    ]);
                    
                    return redirect()->route('application-dashboard')->with('success', 'Application Submitted');
        
                }catch(Exception $e){
                    return back()->with('error', 'Please try again... '.$e);
                }

            }else{
                $applicant = Applicantbio::where('applicant_email', $applicant_email)->update([
                    'sponsor_name' => $request->sponsor_name,
                    'sponsor_phone' => $request->sponsor_phone,
                    'year' => '2022/2023',
                ]);

                //Update Logic
                try{
                    $registration = Applicationreceipt::where('email', $applicant_email)->update([
                        'status' => 4,
                    ]);
                    
                    return redirect()->route('application-dashboard')->with('success', 'Application Submitted');
        
                }catch(Exception $e){
                    return back()->with('error', 'Please try again... '.$e);
                }

            }
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function applicationPaymentReceipt(Request $request){
        $data = $request->validate([
            'receipt' => 'required',
        ]);

        $applicant_email = Auth::guard('application')->user()->email;
        $applicant_name = Auth::guard('application')->user()->name;
        $receipt = $request->receipt;

        // $receiptimageName = '/images/payment/application/'.$applicant_name.'.'.$request->receipt->extension();  

        // Check if PIN exists
        $check_pin = Card::where('pin', $receipt)->count();
            if($check_pin > 0){
                //Check if PIN has been used
                $check_if_pin_used = Applicationreceipt::where('receipt', $receipt)->where('pin', $receipt)->count();
                    if($check_if_pin_used == 0){                
                        try{

                            $session = Applicationreceipt::create([
                                'email'=> $applicant_email,
                                'receipt'=> $receipt,
                                'pin'=> $receipt,
                                'amount'=> '4000',
                                'year'=> '2022/2023',
                                'status'=> 2,
                            ]);
                            
                            // $request->receipt->move('images/payment/application', $receiptimageName);
                                
                            return redirect()->route('application-dashboard')->with('success', 'Payment Confirmed!');
                        
                        }catch(Exception $e){
                            return redirect()->route('application-dashboard')->with('error', 'Please try again... '.$e);
                        }
                    }else{
                        return back()->with('error', 'PIN already Used!');                
                    }
            }else{
                return back()->with('error', 'Invalid PIN!');    
            }        
    }

    public function printSlip(){
        $applicant_email = Auth::guard('application')->user()->email;

        $applicant_bio = Applicantbio::where('applicant_email', $applicant_email)->first();
        $applicant_result = Applicantresult::where('applicant_email', $applicant_email)->get();
        $applicant_qualification = Applicantqualification::where('applicant_email', $applicant_email)->get();
        
        $applicant_result_first = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'First')->get();
        $applicant_result_first_type = Applicantresult::select('exam_type')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_type')->first();
        $applicant_result_first_no = Applicantresult::select('exam_no')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_no')->first();
        $applicant_result_first_year = Applicantresult::select('exam_year')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_year')->first();
        $applicant_result_first_center = Applicantresult::select('exam_center')->where('applicant_email', $applicant_email)->where('sitting', 'First')->pluck('exam_center')->first();
        
        $applicant_result_second = Applicantresult::where('applicant_email', $applicant_email)->where('sitting', 'Second')->get();
        $applicant_result_second_type = Applicantresult::select('exam_type')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_type')->first();
        $applicant_result_second_no = Applicantresult::select('exam_no')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_no')->first();
        $applicant_result_second_year = Applicantresult::select('exam_year')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_year')->first();
        $applicant_result_second_center = Applicantresult::select('exam_center')->where('applicant_email', $applicant_email)->where('sitting', 'Second')->pluck('exam_center')->first();
        
        $applicant_result_a_level = Applicantresultalevel::where('applicant_email', $applicant_email)->get();

        $page_title = 'slip';
        
        $school = User::where('category', 1)->first();

        return view('application.print', compact('page_title', 
        'school', 'applicant_bio', 'applicant_result', 
        'applicant_result_first', 'applicant_result_first_type', 'applicant_result_first_no', 'applicant_result_first_year', 'applicant_result_first_center',    
        'applicant_result_second', 'applicant_result_second_type', 'applicant_result_second_no', 'applicant_result_second_year', 'applicant_result_second_center', 
        'applicant_result_a_level', 'applicant_qualification'));
    }

    public function printAdmissionLetter(){
        $applicant_email = Auth::guard('application')->user()->email;

        $applicant_bio = Applicantbio::where('applicant_email', $applicant_email)->first();
        
        $page_title = 'letter';
        
        $school = User::where('category', 1)->first();

        return view('application.admission', compact('page_title', 'school', 'applicant_bio'));
    }

    public function settingsPassword(Request $request){
        $data = $request->validate([
            'old_password' => ['required'],
            'new_password' => 'required|confirmed',
        ]);

        $student_id = Auth::guard('application')->user()->id;
        $student_password = Auth::guard('application')->user()->password;
        
        try{
            if(Hash::check($request->old_password, $student_password)){
                
                $new_password = Hash::make($request->new_password);
                
                $password = Application::where('id', $student_id)->update([
                    'password'=> $new_password
                ]);
                

                return back()->with('success', 'Password Changed Successfully');
            }else{
                return back()->with('error', 'Old Password Doesn\'t Match!');
            }
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function applicationLogout(Request $request)
    {   
        Auth::guard('application')->logout();
        return redirect()->route('front');
    }
}
