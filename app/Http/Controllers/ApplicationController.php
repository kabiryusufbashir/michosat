<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Application;

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
                
                dd('Stored');
                
                try{
                    if(Auth::guard('application')->attempt(['email' => $email, 'password' => $password])){
                        try{
                            $request->session()->regenerate();
                            return redirect()->route('student-dashboard');
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
            return redirect()->route('all-department')->with('error', 'Please try again... '.$e);
        }
    }

    
    public function logout(Request $request)
    {   
        Auth::guard('applications')->logout();
        return redirect()->route('front');
    }
}
