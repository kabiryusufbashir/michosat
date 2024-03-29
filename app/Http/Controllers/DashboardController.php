<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Application;
use App\Models\Applicantbio;
use App\Models\Applicantresult;
use App\Models\Applicantresultalevel;
use App\Models\Applicationreceipt;
use App\Models\Department;
use App\Models\Programme;
use App\Models\Course;
use App\Models\Staff;
use App\Models\Qualification;
use App\Models\Student;
use App\Models\Registration;
use App\Models\Studentregistration;
use App\Models\Studentregistrationsession;
use App\Models\Studentregistrationsemester;
use App\Models\Calendar;
use App\Models\Timetable;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Studentcgpa;
use App\Models\Card;
use App\Models\Applicantqualification;

class DashboardController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function courses(){
        return view('courses');
    }

    public function courseFee(){
        return view('coursefee');
    }

    public function entry(){
        return view('entry');
    }

    public function processOfAdmission(){
        return view('process_of_admission');
    }

    public function calendarFront(){
        $calendars = Calendar::orderby('session', 'asc')->get();
        return view('calendar', compact('calendars'));
    }

    public function apply(){
        return view('apply');
    }

    public function contact(){
        return view('contact');
    }

    public function dashboard(){
        $calendars = Calendar::orderby('session', 'asc')->get();
        return view('dashboard.index', compact('calendars'));
    }

    // Settings 
    public function settings(){
        return view('dashboard.settings.index');
    }

    public function settingsName(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $system_id = Auth::user()->id;
        $system_name = $request->name;

        try{
            $name = User::where('id', $system_id)->update([
                'name' => $data['name'],
            ]);
            return redirect()->route('root-settings')->with('success', 'Name Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsEmail(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email']
        ]);

        $system_id = Auth::user()->id;
        $system_email = $request->email;

        try{
            $email = User::where('id', $system_id)->update([
                'email' => $data['email'],
            ]);

            return redirect()->route('root-settings')->with('success', 'Email Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsPhoto(Request $request){
        $data = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $system_id = Auth::user()->id;
        $system_photo = $request->photo;
        $imageName = '/images/staff/'.time().'.'.$request->photo->extension();  

        try{
            $photo = User::where('id', $system_id)->update([
                'photo'=> $imageName
            ]);
                
            $request->photo->move('images/staff', $imageName);

            return redirect()->route('root-settings')->with('success', 'Photo Updated');
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    public function settingsPassword(Request $request){
        $data = $request->validate([
            'old_password' => ['required'],
            'new_password' => 'required|confirmed',
        ]);

        $system_id = Auth::user()->id;
        $system_password = Auth::user()->password;
        $password = Hash::make($request->new_password);
        
        try{

            if(Hash::check($request->old_password, $student_password)){
                $password = User::where('id', $system_id)->update([
                    'password'=> $password
                ]);
                return redirect()->route('root-settings')->with('success', 'Password Changed Successfully');
            }else{
                return redirect()->route('root-settings')->with('error', 'Old Password Doesn\'t Match!');
            }
        }catch(Exception $e){
            return redirect()->route('root-settings')->with('error', 'Please try again... '.$e);
        }
    }

    // Application 
    public function allCard(){
        $cards = Card::select('time_generated')->distinct()->paginate(20);
        return view('dashboard.application.allcards', compact('cards'));
    }

    public function printCard($card){
        $cards = Card::where('time_generated', $card)->orderby('id', 'desc')->get();
        $school = User::where('category', 1)->first();
        return view('dashboard.application.printcards', compact('cards', 'card', 'school'));
    }

    public function generateCard(Request $request){
        $data = $request->validate([
            'card_no' => ['required'],
        ]);

        $card_no = $request->card_no;
        $time_generated = date('Ymdhis');

        $pin = [];
        $generated_1 = 'miMcTohseoatPBiatlCiagscc0';
        $generated_2 = $time_generated;
        $generated_1_shuffle = str_shuffle($generated_1);
        $generated_2_shuffle = str_shuffle($generated_2);
        $generated = $generated_1_shuffle.''.$generated_2_shuffle;
        $generated_sub = substr($generated, 11, -10);

        for($x=1; $x<=$card_no; $x++){
            $pin_generated = str_shuffle($generated_sub);
            array_push($pin, $pin_generated);
        }

        // Add Result 
        $data = Array(
            'pin' => $pin,
        );

        try{
            
            if($result = $data['pin']){
                for($x=0; $x<count($result); $x++){
                    $check_record = Card::where('pin', $data['pin'][$x])->count();
                    
                    if($check_record == 0){
                        $result_add = new Card;
                        $result_add['pin'] = $data['pin'][$x];
                        $result_add['application_year'] = '2022/2023';
                        $result_add['time_generated'] = $time_generated;
                        $result_add->save();
                    }
                }
            }

            return redirect()->route('root-all-card')->with('success', 'Pins Generated');
            
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }

    }

    public function usedCard(){
        $cards = Applicationreceipt::where('receipt', '!=', '')->where('pin', '!=', '')->paginate(50);
        return view('dashboard.application.usedcards', compact('cards'));
    }

    public function application(){
        return view('dashboard.application.index');
    }

    public function allApplication(){
        $registrations = Application::orderby('id', 'desc')->paginate(20);
        return view('dashboard.application.application', compact('registrations'));
    }

    public function checkPayment(){
        $check_payments = Applicationreceipt::orderby('created_at', 'asc')->where('status', 1)->paginate(20);
        return view('dashboard.application.check_payment', compact('check_payments'));
    }

    public function checkPaymentEdit($id){
        $check_payment = Applicationreceipt::findOrFail($id);
        return view('dashboard.application.check_payment_edit', compact('check_payment'));
    }

    public function checkPaymentUpdate(Request $request, $id){
        
        $registered_by = Auth::user()->id;

        try{
            $registration = Applicationreceipt::where('id', $id)->update([
                'status' => 2,
                'registered_by' => $registered_by,
            ]);
            return redirect()->route('check-payment')->with('success', 'Payment Confirmed');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function checkApplication(){
        $check_applications = Applicantbio::where('admission_status', 0)->orderby('created_at', 'desc')->where('year', '2022/2023')->paginate(40);
        return view('dashboard.application.check_applications', compact('check_applications'));
    }

    public function checkApplicationEdit($id){
        $applicant_bio = Applicantbio::findOrFail($id);
        $applicant_email = $applicant_bio->applicant_email;

        $programmes = Programme::orderby('name', 'asc')->get();
        
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

        $applicant_name = Application::select('name', 'application_no')->where('email', $applicant_email)->first();
        $applicant_fullname = $applicant_name->name;
        $applicant_no = $applicant_name->application_no;

        return view('dashboard.application.check_applications_edit', compact('applicant_bio', 'applicant_result',
        'applicant_result_first', 'applicant_result_first_type', 'applicant_result_first_no', 'applicant_result_first_year', 'applicant_result_first_center',    
        'applicant_result_second', 'applicant_result_second_type', 'applicant_result_second_no', 'applicant_result_second_year', 'applicant_result_second_center',
        'applicant_result_a_level', 'applicant_fullname', 'applicant_no', 'applicant_qualification', 'programmes'));
    }

    public function checkApplicationUpdate(Request $request, $id){
        
        $registered_by = Auth::user()->id;
        $programmed_selected = Applicantbio::select('programme')->where('applicant_email', $id)->pluck('programme')->first();

        try{
            $registration = Applicationreceipt::where('email', $id)->update([
                'status' => 5,
                'registered_by' => $registered_by,
            ]);

            $admission_status = Applicantbio::where('applicant_email', $id)->update([
                'admission_status' => 1,
                'programme_admitted' => $programmed_selected,
            ]);
            
            return redirect()->route('check-admission')->with('success', 'Applicant admitted!');

        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function checkApplicationChangeCourse(Request $request, $id){
        
        $registered_by = Auth::user()->id;

        $programmed_selected = $request->programme_admitted;

        try{
            $registration = Applicationreceipt::where('email', $id)->update([
                'status' => 5,
                'registered_by' => $registered_by,
            ]);

            $admission_status = Applicantbio::where('applicant_email', $id)->update([
                'admission_status' => 1,
                'programme_admitted' => $programmed_selected,
            ]);
            
            return redirect()->route('check-admission')->with('success', 'Applicant admitted!');

        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function checkAdmission(){
        $check_admissions = Applicantbio::where('admission_status', 1)->orderby('created_at', 'desc')->where('year', '2022/2023')->paginate(40);
        return view('dashboard.application.check_admission', compact('check_admissions'));
    }

    // Department 
    public function department(){
        return view('dashboard.department.index');
    }

    public function createDepartment(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);
        
        $dept_name = $request->name;

        try{
            $check_record = Department::where('name', $dept_name)->count();

            if($check_record == 0){
                $name = Department::create([
                    'name' => $data['name'],
                ]);
                return redirect()->route('all-department')->with('success', $dept_name.' Department Added');
            }else{
                return redirect()->route('all-department')->with('success', $dept_name.' Department Already Exists');
            }


        }catch(Exception $e){
            return redirect()->route('all-department')->with('error', 'Please try again... '.$e);
        }
    }

    public function allDepartment(){
        $departments = Department::orderby('name', 'asc')->paginate(20);
        return view('dashboard.department.department', compact('departments'));
    }

    public function editDepartment($id){
        $dept = Department::findOrFail($id);
        $staff = Staff::where('department', $id)->get();
        return view('dashboard.department.edit', compact('dept', 'staff'));
    }

    public function updateDepartment(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $dept = Department::where('id', $id)->update([
                'name' => $data['name'],
                'hod' => $request->hod,
                'level_coordinator' => $request->level_coordinator,
                'exam_officer' => $request->exam_officer,
            ]);
            return redirect()->route('all-department')->with('success', 'Department Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteDepartment($id){
        $dept = Department::findOrFail($id);
        try{
            $dept->delete();
            return redirect()->route('all-department')->with('success', 'Department Deleted');
        }catch(Exception $e){
            return redirect()->route('all-department')->with('error', 'Please try again... '.$e);
        }
    }

    // Programme 
    public function programme(){
        return view('dashboard.programme.index');
    }

    public function createProgramme(Request $request){
        $data = $request->validate([
            'name' => ['required'],
        ]);
        
        $programme_name = $request->name;

        try{
            $check_record = Programme::where('name', $programme_name)->count();

            if($check_record == 0){
                $name = Programme::create([
                    'name' => $data['name'],
                ]);
                return redirect()->route('all-programme')->with('success', $programme_name.' Programme Added');
            }else{
                return redirect()->route('all-programme')->with('success', $programme_name.' Programme Already Exists');
            }


        }catch(Exception $e){
            return redirect()->route('all-programme')->with('error', 'Please try again... '.$e);
        }
    }

    public function allProgramme(){
        $programmes = Programme::orderby('name', 'asc')->paginate(20);
        return view('dashboard.programme.programme', compact('programmes'));
    }

    public function editProgramme($id){
        $programme = Programme::findOrFail($id);
        return view('dashboard.programme.edit', compact('programme'));
    }

    public function updateProgramme(Request $request, $id){
        $data = $request->validate([
            'name' => ['required']
        ]);

        try{
            $programme = Programme::where('id', $id)->update([
                'name' => $data['name'],
            ]);
            return redirect()->route('all-programme')->with('success', 'Programme Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteprogramme($id){
        $programme = Programme::findOrFail($id);
        try{
            $programme->delete();
            return redirect()->route('all-programme')->with('success', 'Programme Deleted');
        }catch(Exception $e){
            return redirect()->route('all-programme')->with('error', 'Please try again... '.$e);
        }
    }

    // Course 
    public function course(){
        $departments = Department::orderby('name', 'asc')->get();
        return view('dashboard.course.index', compact('departments'));
    }

    public function createCourse(Request $request){
        $data = $request->validate([
            'name' => ['required'],
            'course_code' => ['required'],
            'course_type' => ['required'],
            'course_unit' => ['required'],
            'department' => ['required'],
        ]);
        
        $course_name = $request->name;
        $course_code = $request->course_code;
        $course_type = $request->course_type;
        $course_unit = $request->course_unit;
        $dept_name = $request->department;

        try{
            $name = Course::create([
                'name' => $data['name'],
                'course_code' => $data['course_code'],
                'course_type' => $data['course_type'],
                'course_unit' => $data['course_unit'],
                'department' => $data['department'],
            ]);

            return redirect()->route('all-course')->with('success', $course_name.' Course Added');

        }catch(Exception $e){
            return redirect()->route('all-course')->with('error', 'Please try again... '.$e);
        }
    }

    public function allCourse(){
        $courses = Course::orderby('department', 'asc')->paginate(20);
        return view('dashboard.course.course', compact('courses'));
    }

    public function editCourse($id){
        $course = Course::findOrFail($id);
        $departments = Department::orderby('name', 'asc')->get();
        $staff = Staff::orderby('title', 'asc')->get();

        return view('dashboard.course.edit', compact('course','departments', 'staff'));
    }

    public function updateCourse(Request $request, $id){
        $data = $request->validate([
            'name' => ['required'],
            'course_code' => ['required'],
            'course_type' => ['required'],
            'course_unit' => ['required'],
            'department' => ['required'],
        ]);

        try{
            $course = Course::where('id', $id)->update([
                'name' => $data['name'],
                'course_code' => $data['course_code'],
                'course_type' => $data['course_type'],
                'course_unit' => $data['course_unit'],
                'department' => $data['department'],
                'lecturer' => $request->lecturer,
            ]);
            return redirect()->route('all-course')->with('success', 'Course Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteCourse($id){
        $course = Course::findOrFail($id);
        try{
            $course->delete();
            return redirect()->route('all-course')->with('success', 'Course Deleted');
        }catch(Exception $e){
            return redirect()->route('all-course')->with('error', 'Please try again... '.$e);
        }
    }

    // Staff 
    public function staff(){
        $staff = User::orderby('name', 'asc')->get();
        return view('dashboard.staff.index', compact('staff'));
    }

    public function createStaff(){
        $step = 1;
        return view('dashboard.staff.create', compact('step'));
    }

    public function staffBulkUpload(){
        return view('dashboard.staff.bulk.index');
    }

    public function staffBulkUploadStore(Request $request)
    {
        $file = $request->file('bulk_upload');

        if($file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        
            //Check for file extension and size
            $this->checkUploadedFileProperties($extension, $fileSize);
        
            //Where uploaded file will be stored on the server 
            $location = 'uploads'; //Created an "uploads" folder for that
        
            // Upload file
            $file->move($location, $filename);
        
            // In case the uploaded file path is to be stored in the database 
            $filepath = public_path($location . "/" . $filename);
            
            // Reading file
            $file = fopen($filepath, "r");
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
        
            //Read the contents of the uploaded file 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) 
            {
                $num = count($filedata);
                
                // Skip first row (Remove below comment if you want to skip the first row)
                if($i == 0) {
                    $i++;
                    continue;
                }
                for($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            
            fclose($file); //Close after reading
            
            $j = 0;
            // dd($importData_arr);
            foreach($importData_arr as $importData) {
                $j++;
                try{
                    DB::beginTransaction();
                        User::create([
                            'name' => $importData[0].' '.$importData[1].' '.$importData[2],
                            'email' => $importData[3],
                            'user_id' => $importData[0].Date('my'),
                            'password' => Hash::make('1234567890'),
                            'status' => 1,
                            'category' => 2,
                            'photo' => '',
                            'created_at' => time()
                        ]);
                        $user = User::latest('id')->first();
                        $user_id = $user->id;
                        $username = $user->user_id;
                        
                        Staff::create([
                            'user_id' => $user_id,
                            'title' => $importData[5],
                            'first_name' => $importData[0],
                            'last_name' => $importData[1],
                            'other_name' => $importData[2],
                            'gender' => $importData[6],
                            'dob' => $importData[7],
                            'marital_status' => $importData[8],
                            'email' => $importData[3],
                            'phone' => $importData[4],
                            'address' => $importData[9],
                            'city' => $importData[10],
                            'state' => $importData[11],
                            'country' => $importData[12],
                            'username' => $username,
                            'password' => Hash::make('1234567890'),
                            'status' => 1,
                        ]);         
                    DB::commit();
                }catch(\Exception $e) {
                    //throw $th;
                    DB::rollBack();
                }
            }
            return redirect()->route('all-staff');
        }else{
            //no file was uploaded
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }

    public function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
    
        if(in_array(strtolower($extension), $valid_extension)) {
            if($fileSize <= $maxFileSize) {
            }else{
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        }else{
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }

    public function addStaff(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => 'required|email',
            'last_name' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
            'marital_status' => ['required'],
        ]);

        $name = $data['first_name'].' '.$request->last_name.' '.$request->other_name;
        $user_id = $request->first_name.Date('my');
        $password = Hash::make('1234567890');
        $type = 2;

        try{
            $name = User::create([
                'name' => $name,
                'email' => $data['email'],
                'user_id' => $user_id,
                'password' => $password,
                'status' => 1,
                'category' => $type,
                'photo' => '',
            ]);

            $user = User::latest('id')->first();
            $lastid = $user->id;
            $username = $user->user_id;

            $staff = Staff::create([
                'user_id' => $lastid,
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_name' => $request->other_name,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
                'email' => $request->email,
                'username' => $username,
                'password' => $password,
                'status' => 1,
            ]);

            return redirect()->route('staff-edit-step-2', $lastid);

        }catch(Exception $e){
            return redirect()->route('all-staff')->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep1($id){
        $staff = Staff::where('user_id', $id)->first();
        $step = 1;
        return view('dashboard.staff.edit.index', compact('step', 'staff'));
    }

    public function updateStaffStep1(Request $request, $id){
            
        try{
            $staff = Staff::where('user_id', $id)->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_name' => $request->other_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
            ]);
        
            return redirect()->route('staff-edit-step-2', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep2($id){
        $staff = Staff::where('user_id', $id)->first();
        $step = 2;
        return view('dashboard.staff.edit.index', compact('step', 'staff'));
    }

    public function updateStaffStep2(Request $request, $id){
        
        try{
            $staff = Staff::where('user_id', $id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);

            return redirect()->route('staff-edit-step-3', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep3($id){
        $staff = Staff::where('user_id', $id)->first();
        $qualification = Qualification::where('user_id', $id)->get();
        $step = 3;
        return view('dashboard.staff.edit.index', compact('step', 'staff', 'qualification'));
    }

    public function updateStaffStep3(Request $request, $id){
        
        // Add Qualification 
        $data = Array(
            'school_name' => $request->school_name,
            'year_graduated' => $request->year_graduated,
            'qualification_name' => $request->qualification_name,
        );

        try{

            $check_record = Qualification::where('user_id', $id)->count();
            
            if($check_record == 0){
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['category'] = 2;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }else{
                $delete_previous_record = Qualification::where('user_id', $id)->delete();
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['category'] = 2;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }

            return redirect()->route('staff-edit-step-4', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStaffStep4($id){
        $staff = Staff::where('user_id', $id)->first();
        $departments = Department::orderby('name', 'asc')->get();
        $step = 4;
        return view('dashboard.staff.edit.index', compact('step', 'staff', 'departments'));
    }

    public function updateStaffStep4(Request $request, $id){
        
        if(!empty($request->photo)){
            $data = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'department' => 'required',
            ]);
            
            $imageName = '/images/staff/'.time().'.'.$request->photo->extension();
            $request->photo->move('images/staff', $imageName);  
        }

        $user_photo = $request->photo;
        $user_department = $request->department;

        try{
            if(!empty($request->photo)){
                $photo = User::where('id', $id)->update([
                    'photo'=> $imageName
                ]);
            }

            if(!empty($request->photo)){
                $department = Staff::where('user_id', $id)->update([
                    'department'=> $user_department,
                    'photo'=> $imageName
                ]);
            }else{
                $department = Staff::where('user_id', $id)->update([
                    'department'=> $user_department,
                ]);
            }

            return redirect()->route('all-staff')->with('success', 'Staff Added');
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function allStaff(){
        $staff = User::where('category', 2)->where('status', 1)->orderby('name', 'asc')->paginate(20);
        return view('dashboard.staff.staff', compact('staff'));
    }

    public function deleteStaff($id){
        try{
            $staff = User::where('id', $id)->update([
                'status' => 0,
            ]);
            return redirect()->route('all-staff')->with('success', 'Staff Deleted');
        }catch(Exception $e){
            return redirect()->route('all-staff')->with('error', 'Please try again... '.$e);
        }
    }

    // Student
    public function student(){
        $student = User::orderby('name', 'asc')->get();
        return view('dashboard.student.index', compact('student'));
    }

    public function createStudent(){
        $step = 1;
        return view('dashboard.student.create', compact('step'));
    }

    public function studentBulkUpload(){
        return view('dashboard.student.bulk.index');
    }

    public function studentBulkUploadStore(Request $request)
    {
        $file = $request->file('bulk_upload');

        if($file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        
            //Check for file extension and size
            $this->checkUploadedFileProperties($extension, $fileSize);
        
            //Where uploaded file will be stored on the server 
            $location = 'uploads'; //Created an "uploads" folder for that
        
            // Upload file
            $file->move($location, $filename);
        
            // In case the uploaded file path is to be stored in the database 
            $filepath = public_path($location . "/" . $filename);
            
            // Reading file
            $file = fopen($filepath, "r");
            $importData_arr = array(); // Read through the file and store the contents as an array
            $i = 0;
        
            //Read the contents of the uploaded file 
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) 
            {
                $num = count($filedata);
                
                // Skip first row (Remove below comment if you want to skip the first row)
                if($i == 0) {
                    $i++;
                    continue;
                }
                for($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            
            fclose($file); //Close after reading
            
            $j = 0;
            foreach($importData_arr as $importData) {
                $j++;
                try{
                    DB::beginTransaction();
                        User::create([
                            'name' => $importData[0].' '.$importData[1].' '.$importData[2],
                            'email' => $importData[3],
                            'user_id' => $importData[0].Date('my'),
                            'password' => Hash::make('1234567890'),
                            'status' => 1,
                            'category' => 3,
                            'photo' => '',
                            'created_at' => time()
                        ]);
                        $user = User::latest('id')->first();
                        $user_id = $user->id;
                        $username = $user->user_id;
                        
                        Student::create([
                            'user_id' => $user_id,
                            'title' => $importData[5],
                            'first_name' => $importData[0],
                            'last_name' => $importData[1],
                            'other_name' => $importData[2],
                            'gender' => $importData[6],
                            'dob' => $importData[7],
                            'marital_status' => $importData[8],
                            'email' => $importData[3],
                            'phone' => $importData[4],
                            'address' => $importData[9],
                            'city' => $importData[10],
                            'state' => $importData[11],
                            'country' => $importData[12],
                            'matric_no' => $importData[13],
                            'year_admitted' => $importData[14],
                            'current_year' => $importData[15],
                            'username' => $username,
                            'password' => Hash::make('1234567890'),
                            'status' => 1,
                        ]);         
                    DB::commit();
                }catch(\Exception $e) {
                    //throw $th;
                    DB::rollBack();
                }
            }
            return redirect()->route('all-student');
        }else{
            //no file was uploaded
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }

    public function addStudent(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => 'required|email',
            'last_name' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
            'marital_status' => ['required'],
        ]);

        $name = $data['first_name'].' '.$request->last_name.' '.$request->other_name;
        $user_id = $request->first_name.Date('my');
        $password = Hash::make('1234567890');
        $type = 3;
        $matric_no = $request->matric_no;

        $check_record = Student::where('matric_no', $matric_no)->count();

        if($check_record == 0){
            try{
                $name = User::create([
                    'name' => $name,
                    'email' => $data['email'],
                    'user_id' => $user_id,
                    'password' => $password,
                    'status' => 1,
                    'category' => $type,
                    'photo' => '',
                ]);

                $user = User::latest('id')->first();
                $lastid = $user->id;
                $username = $user->user_id;

                $student = Student::create([
                    'user_id' => $lastid,
                    'title' => $request->title,
                    'matric_no' => $request->matric_no,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'other_name' => $request->other_name,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'marital_status' => $request->marital_status,
                    'email' => $request->email,
                    'username' => $username,
                    'password' => $password,
                    'status' => 1,
                ]);

                return redirect()->route('student-edit-step-2', $lastid);

            }catch(Exception $e){
                return redirect()->route('all-student')->with('error', 'Please try again... '.$e);
            }
        }else{
            return redirect()->route('all-student')->with('error', 'Matric No Already exists');
        }

    }

    public function editStudentStep1($id){
        $student = Student::where('user_id', $id)->first();
        $step = 1;
        return view('dashboard.student.edit.index', compact('step', 'student'));
    }

    public function updateStudentStep1(Request $request, $id){
        
        $matric_no = $request->matric_no;

        $check_record = Student::where('matric_no', $matric_no)->count();

        if($check_record == 0){
            try{
                $student = Student::where('user_id', $id)->update([
                    'title' => $request->title,
                    'matric_no' => $request->matric_no,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'other_name' => $request->other_name,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'dob' => $request->dob,
                    'marital_status' => $request->marital_status,
                ]);
            
                return redirect()->route('student-edit-step-2', $id);
            
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            return back()->with('error', 'Matric No Already exists');
        }

    }

    public function editStudentStep2($id){
        $student = Student::where('user_id', $id)->first();
        $step = 2;
        return view('dashboard.student.edit.index', compact('step', 'student'));
    }

    public function updateStudentStep2(Request $request, $id){
        
        try{
            $student = Student::where('user_id', $id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);

            return redirect()->route('student-edit-step-3', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStudentStep3($id){
        $student = Student::where('user_id', $id)->first();
        $qualification = Qualification::where('user_id', $id)->get();
        $step = 3;
        return view('dashboard.student.edit.index', compact('step', 'student', 'qualification'));
    }

    public function updateStudentStep3(Request $request, $id){
        
        // Add Qualification 
        $data = Array(
            'school_name' => $request->school_name,
            'year_graduated' => $request->year_graduated,
            'qualification_name' => $request->qualification_name,
        );

        try{

            $student = Student::where('user_id', $id)->update([
                'year_admitted' => $request->year_admitted,
                'current_year' => $request->current_year,
            ]);

            $check_record = Qualification::where('user_id', $id)->count();
            
            if($check_record == 0){
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['category'] = 3;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }else{
                $delete_previous_record = Qualification::where('user_id', $id)->delete();
                if($qualification = $data['school_name']){
                    for($x=0; $x<count($qualification); $x++){
                        $qualification_add = new Qualification;
                        $qualification_add['user_id'] = $id;
                        $qualification_add['category'] = 3;
                        $qualification_add['school_name'] = $data['school_name'][$x];
                        $qualification_add['year_graduated'] = $data['year_graduated'][$x];
                        $qualification_add['qualification_name'] = $data['qualification_name'][$x];
                        $qualification_add->save();
                    }
                }
            }

            return redirect()->route('student-edit-step-4', $id);
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function editStudentStep4($id){
        $student = Student::where('user_id', $id)->first();
        $departments = Department::orderby('name', 'asc')->get();
        $programmes = Programme::orderby('name', 'asc')->get();
        $step = 4;
        return view('dashboard.student.edit.index', compact('step', 'student', 'departments', 'programmes'));
    }

    public function updateStudentStep4(Request $request, $id){
        
        if(!empty($request->photo)){
            $data = $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'department' => 'required',
                'programme' => 'required',
            ]);
            
            $imageName = '/images/student/'.time().'.'.$request->photo->extension();
            $request->photo->move('images/student', $imageName);  
        }

        $user_photo = $request->photo;
        $user_department = $request->department;
        $user_programme = $request->programme;

        try{
            if(!empty($request->photo)){
                $photo = User::where('id', $id)->update([
                    'photo'=> $imageName
                ]);
            }

            if(!empty($request->photo)){
                $department = Student::where('user_id', $id)->update([
                    'department'=> $user_department,
                    'programme'=> $user_programme,
                    'photo'=> $imageName
                ]);
            }else{
                $department = Student::where('user_id', $id)->update([
                    'department'=> $user_department,
                    'programme'=> $user_programme,
                ]);
            }

            return redirect()->route('all-student')->with('success', 'Student Updated');
        
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function allStudent(){
        $student = User::where('category', 3)->where('status', 1)->orderby('name', 'asc')->paginate(20);
        return view('dashboard.student.student', compact('student'));
    }

    public function deleteStudent($id){
        try{
            $student = User::where('id', $id)->update([
                'status' => 0,
            ]);
            return redirect()->route('all-student')->with('success', 'Student Deleted');
        }catch(Exception $e){
            return redirect()->route('all-student')->with('error', 'Please try again... '.$e);
        }
    }

    // Registration 
    public function registration(){
        $sessions = Registration::orderby('session', 'asc')->get();
        $courses = Course::orderby('name', 'asc')->get();
        $students = Student::select('user_id','matric_no')->orderby('matric_no', 'asc')->get();
        return view('dashboard.registration.index', compact('sessions','courses','students'));
    }

    public function createRegistration(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'session' => ['required'],
            'semester' => ['required'],
            'active' => ['required'],
        ]);
        
        $check_record = Registration::where('title', $data['title'])->count();

        if($check_record == 0){
            try{
                $name = Registration::create([
                    'title' => $data['title'],
                    'session' => $data['session'],
                    'semester' => $data['semester'],
                    'active' => $data['active'],
                ]);
    
                return redirect()->route('all-registration')->with('success', $data['title'].' Registration Added');
    
            }catch(Exception $e){
                return redirect()->route('all-registration')->with('error', 'Please try again... '.$e);
            }
        }else{
            return redirect()->route('all-registration')->with('error', $data['title'].' Already Exists');        
        }

    }

    public function createRegistrationStudent(Request $request){
        $data = $request->validate([
            'session' => ['required'],
            'semester' => ['required'],
            'course_id' => ['required'],
            'student_id' => ['required'],
        ]);
        

        $session = $data['session'];
        $semester = $data['semester'];
        $course_id = $data['course_id'];
        $student_id = $data['student_id'];

        try{
            $check_record = Studentregistration::where('session', $session)->where('semester', $semester)->where('course_id', $course_id)->where('student_id', $student_id)->count();
            
            if($check_record == 0){

                $name = Studentregistration::create([
                    'session' => $data['session'],
                    'semester' => $data['semester'],
                    'course_id' => $data['course_id'],
                    'student_id' => $data['student_id'],
                    'registered_by' => Auth::user()->id,
                ]);
    
                return redirect()->route('root-registration')->with('success', 'Student Registerted');
            }else{
                return redirect()->route('root-registration')->with('error', 'Student Alreday Registered');
            }

        }catch(Exception $e){
            return redirect()->route('all-registration')->with('error', 'Please try again... '.$e);
        }
    }

    public function allRegistration(){
        $registrations = Registration::orderby('title', 'asc')->paginate(20);
        return view('dashboard.registration.registration', compact('registrations'));
    }

    public function editRegistration($id){
        $registration = Registration::findOrFail($id);
        return view('dashboard.registration.edit', compact('registration'));
    }

    public function updateRegistration(Request $request, $id){
        $data = $request->validate([
            'title' => ['required'],
            'semester' => ['required'],
            'session' => ['required'],
            'active' => ['required'],
        ]);

        try{
            $registration = Registration::where('id', $id)->update([
                'title' => $data['title'],
                'semester' => $data['semester'],
                'session' => $data['session'],
                'active' => $data['active'],
            ]);
            return redirect()->route('all-registration')->with('success', 'Registration Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function checkPaymentSession(){
        $check_payments = Studentregistrationsession::orderby('created_at', 'asc')->where('status', 1)->paginate(20);
        return view('dashboard.registration.check_session_payment', compact('check_payments'));
    }

    public function checkPaymentSessionEdit($id){
        $check_payment = Studentregistrationsession::findOrFail($id);
        return view('dashboard.registration.check_session_payment_edit', compact('check_payment'));
    }

    public function checkPaymentSessionUpdate(Request $request, $id){
        
        $registered_by = Auth::user()->id;

        try{
            $registration = Studentregistrationsession::where('id', $id)->update([
                'status' => 2,
                'registered_by' => $registered_by,
            ]);
            return redirect()->route('check-payment-session')->with('success', 'Payment Confirmed');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function checkPaymentSemester(){
        $check_payments = Studentregistrationsemester::orderby('created_at', 'asc')->where('status', 1)->paginate(20);
        return view('dashboard.registration.check_semester_payment', compact('check_payments'));
    }

    public function checkPaymentSemesterEdit($id){
        $check_payment = Studentregistrationsemester::findOrFail($id);
        return view('dashboard.registration.check_semester_payment_edit', compact('check_payment'));
    }

    public function checkPaymentSemesterUpdate(Request $request, $id){
        
        $registered_by = Auth::user()->id;

        try{
            $registration = Studentregistrationsemester::where('id', $id)->update([
                'status' => 2,
                'registered_by' => $registered_by,
            ]);
            return redirect()->route('check-payment-semester')->with('success', 'Payment Confirmed');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteRegistration($id){
        $registration = Registration::findOrFail($id);
        try{
            $registration->delete();
            return redirect()->route('all-registration')->with('success', 'Registration Deleted');
        }catch(Exception $e){
            return redirect()->route('all-registration')->with('error', 'Please try again... '.$e);
        }
    }

    // Calendar 
    public function calendar(){
        $sessions = Registration::orderby('session', 'asc')->get();
        return view('dashboard.calendar.index', compact('sessions'));
    }

    public function createCalendar(Request $request){
        $data = $request->validate([
            'session' => ['required'],
            'activity' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        
        if($start_date > $end_date){
            return redirect()->route('all-calendar')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $name = Calendar::create([
                'session' => $data['session'],
                'activity' => $data['activity'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'posted_by' => Auth::user()->id,
            ]);

            return redirect()->route('all-calendar')->with('success', $data['activity'].' calendar Added');

        }catch(Exception $e){
            return redirect()->route('all-calendar')->with('error', 'Please try again... '.$e);
        }
    }

    public function allCalendar(){
        $calendars = Calendar::orderby('start_date', 'asc')->paginate(20);
        return view('dashboard.calendar.calendar', compact('calendars'));
    }

    public function editCalendar($id){
        $calendar = Calendar::findOrFail($id);
        $sessions = Registration::orderby('session', 'asc')->get();
        return view('dashboard.calendar.edit', compact('calendar', 'sessions'));
    }

    public function updateCalendar(Request $request, $id){
        $data = $request->validate([
            'session' => ['required'],
            'activity' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        
        if($start_date > $end_date){
            return redirect()->route('all-calendar')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $calendar = Calendar::where('id', $id)->update([
                'session' => $data['session'],
                'activity' => $data['activity'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
            return redirect()->route('all-calendar')->with('success', 'Calendar Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteCalendar($id){
        $calendar = Calendar::findOrFail($id);
        try{
            $calendar->delete();
            return redirect()->route('all-calendar')->with('success', 'Calendar Deleted');
        }catch(Exception $e){
            return redirect()->route('all-calendar')->with('error', 'Please try again... '.$e);
        }
    }

    // Timetable 
    public function timetable(){
        $sessions = Registration::orderby('session', 'asc')->get();
        $courses = Course::orderby('name', 'asc')->get();
        return view('dashboard.timetable.index', compact('sessions', 'courses'));
    }

    public function createTimetable(Request $request){
        $data = $request->validate([
            'session' => ['required'],
            'course' => ['required'],
            'venue' => ['required'],
            'day' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        $course = $data['course'];
        $department = Course::select('department')->where('id', $course)->pluck('department')->first();
        
        if($start_date > $end_date){
            return redirect()->route('all-timetable')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $name = Timetable::create([
                'session' => $data['session'],
                'course' => $data['course'],
                'department' => $department,
                'venue' => $data['venue'],
                'day' => $data['day'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'posted_by' => Auth::user()->id,
            ]);

            return redirect()->route('all-timetable')->with('success', 'Timetable Added');

        }catch(Exception $e){
            return redirect()->route('all-timetable')->with('error', 'Please try again... '.$e);
        }
    }

    public function allTimetable(){
        $timetables = Timetable::select('session', 'department', 'posted_by')->distinct()->paginate(20);
        return view('dashboard.timetable.timetable', compact('timetables'));
    }

    public function showTimetable($department){
        $timetables = Timetable::where('department', $department)->get();
        
        $monday = Timetable::where('day','Monday')->where('department', $department)->orderby('start_date', 'asc')->get();
        $tuesday = Timetable::where('day','Tuesday')->where('department', $department)->orderby('start_date', 'asc')->get();
        $wednesday = Timetable::where('day','Wednesday')->where('department', $department)->orderby('start_date', 'asc')->get();
        $thursday = Timetable::where('day','Thursday')->where('department', $department)->orderby('start_date', 'asc')->get();
        $friday = Timetable::where('day','Friday')->where('department', $department)->orderby('start_date', 'asc')->get();
        $saturday = Timetable::where('day','Saturday')->where('department', $department)->orderby('start_date', 'asc')->get();

        $department = Department::select('name')->where('id', $department)->pluck('name')->first();
        
        return view('dashboard.timetable.show', compact('timetables', 'department', 'monday','tuesday','wednesday','thursday','friday','saturday'));
    
    }

    public function editTimetable($id){
        $timetable = Timetable::findOrFail($id);
        $sessions = Registration::orderby('session', 'asc')->get();
        $courses = Course::orderby('name', 'asc')->get();
        return view('dashboard.timetable.edit', compact('timetable', 'sessions', 'courses'));
    }

    public function updateTimetable(Request $request, $id){
        $data = $request->validate([
            'session' => ['required'],
            'course' => ['required'],
            'venue' => ['required'],
            'day' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        $course = $data['course'];
        $department = Course::select('department')->where('id', $course)->pluck('department')->first();
        
        if($start_date > $end_date){
            return redirect()->route('all-timetable')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $timetable = Timetable::where('id', $id)->update([
                'session' => $data['session'],
                'course' => $data['course'],
                'department' => $department,
                'venue' => $data['venue'],
                'day' => $data['day'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
            return redirect()->route('all-timetable')->with('success', 'Timetable Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteTimetable($id){
        $timetable = Timetable::findOrFail($id);
        try{
            $timetable->delete();
            return redirect()->route('all-timetable')->with('success', 'Timetable Deleted');
        }catch(Exception $e){
            return redirect()->route('all-timetable')->with('error', 'Please try again... '.$e);
        }
    }
    
    // Exam 
    public function exam(){
        $sessions = Registration::orderby('session', 'asc')->get();
        return view('dashboard.exam.index', compact('sessions'));
    }

    public function createExam(Request $request){
        $data = $request->validate([
            'session' => ['required'],
            'exam_type' => ['required'],
            'semester' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        
        if($start_date > $end_date){
            return redirect()->route('all-exam')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $name = Exam::create([
                'session' => $data['session'],
                'exam_type' => $data['exam_type'],
                'semester' => $data['semester'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'posted_by' => Auth::user()->id,
            ]);

            return redirect()->route('all-exam')->with('success', 'Exam Added');

        }catch(Exception $e){
            return redirect()->route('all-exam')->with('error', 'Please try again... '.$e);
        }
    }

    public function allExam(){
        $exams = Exam::orderby('start_date', 'asc')->paginate(20);
        return view('dashboard.exam.exam', compact('exams'));
    }

    public function editExam($id){
        $exam = Exam::findOrFail($id);
        $sessions = Registration::orderby('session', 'asc')->get();
        return view('dashboard.exam.edit', compact('exam', 'sessions'));
    }

    public function updateExam(Request $request, $id){
        $data = $request->validate([
            'session' => ['required'],
            'exam_type' => ['required'],
            'semester' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $start_date = strtotime($data['start_date']);
        $end_date = strtotime($data['end_date']);
        
        if($start_date > $end_date){
            return redirect()->route('all-exam')->with('error', $data['start_date'].' is greater than '.$data['end_date']);
        }

        try{
            $exam = Exam::where('id', $id)->update([
                'session' => $data['session'],
                'exam_type' => $data['exam_type'],
                'semester' => $data['semester'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
            return redirect()->route('all-exam')->with('success', 'Exam Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteExam($id){
        $exam = Exam::findOrFail($id);
        try{
            $exam->delete();
            return redirect()->route('all-exam')->with('success', 'Exam Deleted');
        }catch(Exception $e){
            return redirect()->route('all-exam')->with('error', 'Please try again... '.$e);
        }
    }

    // Result 
    public function result(){
        $sessions = Registration::orderby('session', 'asc')->get();
        $courses = Course::orderby('name', 'asc')->get();
        return view('dashboard.result.index', compact('sessions', 'courses'));
    }

    public function createResult(Request $request){
        $data = $request->validate([
            'session' => ['required'],
            'semester' => ['required'],
            'course_id' => ['required'],
        ]);

        $session = $request->session;
        $semester = $request->semester;
        $course_id = $request->course_id;

        try{
            $students = Studentregistration::where('semester', $semester)->where('session', $session)->where('course_id', $course_id)->get();
            if(count($students) > 0){
                return redirect()->route('insert-result', compact('students', 'session', 'semester', 'course_id'));
            }else{
                return redirect()->route('root-result')->with('error', 'No Student Found');
            }
        
        }catch(Exception $e){
            return redirect()->route('root-result')->with('error', 'Please try again... '.$e);
        }
    }

    public function insertResult(Request $request){
        
        $session = $request->session;
        $semester = $request->semester;
        $course_id = $request->course_id;

        $students = Studentregistration::where('semester', $semester)->where('session', $session)->where('course_id', $course_id)->get();
        
        if(count($students) > 0){
            $course = Course::select('name')->where('id', $course_id)->first();
            $course_name = $course->name;
            
            $session = Registration::select('session')->where('id', $session)->first();
            $session_year = $session->session;

            return view('dashboard.result.insert', compact('students', 'session_year', 'semester', 'course_name'));
        }else{
            return redirect()->route('root-result')->with('error', 'No Student Found');
        }
    }

    public function submitResult(Request $request){
        
        $session = $request->session;
        $semester = $request->semester;
        $course = $request->course;
        $posted_by = Auth::user()->id;

        $session = Registration::where('session', $session)->first();
        $session_id = $session->id;
        $session = $session->session;

        $course = Course::where('name', $course)->first();
        $course_id = $course->id;
        $course_unit = $course->course_unit;

        $data = Array(
            'student_id' => $request->student_id,
            'ca' => $request->ca,
            'exams' => $request->exams,
        );

        try{
            if($students = $data['student_id']){
                for($x=0; $x<count($students); $x++){
                    $result_add = new Result;
                    
                    $result_add['session'] = $session_id;
                    $result_add['course'] = $course_id;
                    $result_add['semester'] = $semester;
                    $result_add['student_id'] = $data['student_id'][$x];
                    $result_add['ca'] = $data['ca'][$x];
                    $result_add['exams'] = $data['exams'][$x];
                    $result_add['posted_by'] = $posted_by;
                    $result_add->save();

                }
                return redirect()->route('all-result')->with('success', 'Result Stored');
            }

        }catch(Exception $e){
            return redirect()->route('all-result')->with('error', 'Please try again... '.$e);
        }
    }

    public function allResult(){
        $results = Result::select('session', 'semester', 'course', 'posted_by')->distinct()->paginate(20);
        return view('dashboard.result.result', compact('results'));
    }

    public function showResult(Request $request){
        $semester = $request->semester;
        $course = $request->course;
        $session = $request->session;

        $results = Result::where('semester', $semester)->where('course', $course)->where('session', $session)->get();
        
        $course = Course::select('name')->where('id', $course)->first();
        $course_name = $course->name;
        
        $session = Registration::select('session')->where('id', $session)->first();
        $session_year = $session->session;        

        return view('dashboard.result.show', compact('results', 'course_name', 'semester', 'session_year'));
    
    }

    public function editResult($id){
        $result = Result::findOrFail($id);
        $student = Student::where('user_id', $result->student_id)->first();
        $course = Course::where('id', $result->course)->first();
        $session = Registration::where('id', $result->session)->first();
        $student_name = $student->title.' '.$student->first_name.' '.$student->last_name.' '.$student->other_name;
        $course_name = $course->name;
        $session_year = $session->session;
        return view('dashboard.result.edit', compact('result', 'student_name', 'course_name', 'session_year'));
    }

    public function updateResult(Request $request, $id){
        $data = $request->validate([
            'ca' => ['required'],
            'exams' => ['required'],
        ]);

        try{
            $result = Result::where('id', $id)->update([
                'ca' => $data['ca'],
                'exams' => $data['exams'],
            ]);
            return redirect()->route('all-result')->with('success', 'Result Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function deleteResult($id){
        $result = Result::findOrFail($id);
        try{
            $result->delete();
            return redirect()->route('all-result')->with('success', 'Result Deleted');
        }catch(Exception $e){
            return redirect()->route('all-result')->with('error', 'Please try again... '.$e);
        }
    }

}
