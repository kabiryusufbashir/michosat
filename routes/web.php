<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GlobalData;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('front');
Route::get('/courses', [DashboardController::class, 'courses'])->name('courses');
Route::get('/entry', [DashboardController::class, 'entry'])->name('entry');
Route::get('/calendar', [DashboardController::class, 'calendarFront'])->name('calendar-front');
Route::get('/process-of-admission', [DashboardController::class, 'processOfAdmission'])->name('process-of-admission');
Route::get('/course/fee', [DashboardController::class, 'courseFee'])->name('course-fee');
Route::get('/apply', [DashboardController::class, 'apply'])->name('apply');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');

//Application
Route::post('/applynow', [ApplicationController::class, 'applyNow'])->name('applynow');
Route::get('/apply/login', [ApplicationController::class, 'applicationLogin'])->name('application-login');
Route::post('/applynow/login', [ApplicationController::class, 'applyNowLogin'])->name('applynowlogin');
Route::get('/apply/logout', [ApplicationController::class, 'applicationLogout'])->name('application-logout');
Route::get('/payment', [ApplicationController::class, 'applicationPayment'])->name('application-payment');
Route::get('/application/payment/callback', [ApplicationController::class, 'applicationPaymentCallBack'])->name('application-payment-callback');

// APPLICATION PORTAL 
Route::group(['prefix' => 'application'], function () {
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('application-dashboard')->middleware('auth:application');
    // Registration 
    Route::get('/registration/bio', [ApplicationController::class, 'registrationBio'])->name('application-registration-bio')->middleware('auth:application');
    Route::post('/registration/bio', [ApplicationController::class, 'registrationBioSubmit'])->name('application-registration-bio-submit')->middleware('auth:application');
    Route::get('/registration/programme', [ApplicationController::class, 'registrationPhoto'])->name('application-registration-photo')->middleware('auth:application');
    Route::post('/registration/photo', [ApplicationController::class, 'registrationPhotoSubmit'])->name('application-registration-photo-submit')->middleware('auth:application');
    Route::get('/registration/result', [ApplicationController::class, 'registrationResult'])->name('application-registration-result')->middleware('auth:application');
    Route::post('/registration/result', [ApplicationController::class, 'registrationResultSubmit'])->name('application-registration-result-submit')->middleware('auth:application');
    Route::get('/registration/qualification', [ApplicationController::class, 'registrationQualification'])->name('application-registration-qualification')->middleware('auth:application');
    Route::post('/registration/qualification', [ApplicationController::class, 'registrationQualificationSubmit'])->name('application-registration-qualification-submit')->middleware('auth:application');
    Route::get('/registration/kin', [ApplicationController::class, 'registrationKin'])->name('application-registration-kin')->middleware('auth:application');
    Route::post('/registration/kin', [ApplicationController::class, 'registrationKinSubmit'])->name('application-registration-kin-submit')->middleware('auth:application');
    Route::get('/registration/sponsor', [ApplicationController::class, 'registrationSponsor'])->name('application-registration-sponsor')->middleware('auth:application');
    Route::post('/registration/sponsor', [ApplicationController::class, 'registrationSponsorSubmit'])->name('application-registration-sponsor-submit')->middleware('auth:application');
    
    // PAYMENT
    Route::get('/payment', [ApplicationController::class, 'payment'])->name('student-payment')->middleware('auth:application');
    Route::post('/payment/submit', [ApplicationController::class, 'applicationPaymentReceipt'])->name('application-payment-receipt')->middleware('auth:application');
    
    // Print 
    Route::get('/print/slip', [ApplicationController::class, 'printSlip'])->name('print-slip')->middleware('auth:application');
    Route::get('/print/admission/notification/letter', [ApplicationController::class, 'printAdmissionNotificationLetter'])->name('print-admission-notification')->middleware('auth:application');
    Route::get('/print/admission/letter', [ApplicationController::class, 'printAdmissionLetter'])->name('print-admission')->middleware('auth:application');

    // SETTINGS
    Route::post('/settings-password', [ApplicationController::class, 'settingsPassword'])->name('applicant-settings-password')->middleware('auth:application');
});

// Login 
Route::get('/login', [LoginController::class, 'loginForm'])->name('login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/student/login', [LoginController::class, 'studentLogin'])->name('login-student');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// DASHBOARD 
Route::group(['prefix' => 'admin'], function (){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth:web');
    
    // Department 
    Route::get('/department', [DashboardController::class, 'department'])->name('root-department')->middleware('auth:web');
    Route::post('/dept-create', [DashboardController::class, 'createDepartment'])->name('dept-create')->middleware('auth:web');
    Route::get('/alldepartment', [DashboardController::class, 'allDepartment'])->name('all-department')->middleware('auth:web');
    Route::get('/department/{dept}/edit', [DashboardController::class, 'editDepartment'])->name('dept-edit')->middleware('auth:web');
    Route::patch('/department/{department}/update', [DashboardController::class, 'updateDepartment'])->name('dept-update')->middleware('auth:web');
    Route::delete('/department/{department}', [DashboardController::class, 'deleteDepartment'])->name('dept-delete')->middleware('auth:web');
    
    // Programme 
    Route::get('/programme', [DashboardController::class, 'programme'])->name('root-programme')->middleware('auth:web');
    Route::post('/programme-create', [DashboardController::class, 'createProgramme'])->name('programme-create')->middleware('auth:web');
    Route::get('/allprogramme', [DashboardController::class, 'allProgramme'])->name('all-programme')->middleware('auth:web');
    Route::get('/programme/{programme}/edit', [DashboardController::class, 'editProgramme'])->name('programme-edit')->middleware('auth:web');
    Route::patch('/programme/{programme}/update', [DashboardController::class, 'updateProgramme'])->name('programme-update')->middleware('auth:web');
    Route::delete('/programme/{programme}', [DashboardController::class, 'deleteProgramme'])->name('programme-delete')->middleware('auth:web');

    // Course
    Route::get('/course', [DashboardController::class, 'course'])->name('root-course')->middleware('auth:web');
    Route::post('/course-create', [DashboardController::class, 'createCourse'])->name('course-create')->middleware('auth:web');
    Route::get('/allcourse', [DashboardController::class, 'allCourse'])->name('all-course')->middleware('auth:web');
    Route::get('/course/{course}/edit', [DashboardController::class, 'editCourse'])->name('course-edit')->middleware('auth:web');
    Route::patch('/course/{course}/update', [DashboardController::class, 'updateCourse'])->name('course-update')->middleware('auth:web');
    Route::delete('/course/{course}', [DashboardController::class, 'deleteCourse'])->name('course-delete')->middleware('auth:web');
    
    // Staff
    Route::get('/staff', [DashboardController::class, 'staff'])->name('root-staff')->middleware('auth:web');
    Route::get('/allstaff', [DashboardController::class, 'allStaff'])->name('all-staff')->middleware('auth:web');
    Route::get('/staff-create', [DashboardController::class, 'createStaff'])->name('create-staff')->middleware('auth:web');
    Route::get('/staff-bulk-upload', [DashboardController::class, 'staffBulkUpload'])->name('staff-bulk-upload')->middleware('auth:web');
    Route::post('/upload-staff-bulk', [DashboardController::class, 'staffBulkUploadStore'])->name('staff-bulk-upload-store')->middleware('auth:web');
    Route::post('/add-create', [DashboardController::class, 'addStaff'])->name('add-staff')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_1', [DashboardController::class, 'editStaffStep1'])->name('staff-edit-step-1')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_1', [DashboardController::class, 'updateStaffStep1'])->name('staff-update-step-1')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_2', [DashboardController::class, 'editStaffStep2'])->name('staff-edit-step-2')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_2', [DashboardController::class, 'updateStaffStep2'])->name('staff-update-step-2')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_3', [DashboardController::class, 'editStaffStep3'])->name('staff-edit-step-3')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_3', [DashboardController::class, 'updateStaffStep3'])->name('staff-update-step-3')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_4', [DashboardController::class, 'editStaffStep4'])->name('staff-edit-step-4')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_4', [DashboardController::class, 'updateStaffStep4'])->name('staff-update-step-4')->middleware('auth:web');
    Route::delete('/staff/{staff}', [DashboardController::class, 'deleteStaff'])->name('staff-delete')->middleware('auth:web');
    
    // Student
    Route::get('/student', [DashboardController::class, 'student'])->name('root-student')->middleware('auth:web');
    Route::get('/allstudent', [DashboardController::class, 'allStudent'])->name('all-student')->middleware('auth:web');
    Route::get('/student-create', [DashboardController::class, 'createStudent'])->name('create-student')->middleware('auth:web');
    Route::get('/student-bulk-upload', [DashboardController::class, 'studentBulkUpload'])->name('student-bulk-upload')->middleware('auth:web');
    Route::post('/upload-student-bulk', [DashboardController::class, 'studentBulkUploadStore'])->name('student-bulk-upload-store')->middleware('auth:web');
    Route::post('/add-create', [DashboardController::class, 'addStudent'])->name('add-student')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_1', [DashboardController::class, 'editStudentStep1'])->name('student-edit-step-1')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_1', [DashboardController::class, 'updateStudentStep1'])->name('student-update-step-1')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_2', [DashboardController::class, 'editStudentStep2'])->name('student-edit-step-2')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_2', [DashboardController::class, 'updateStudentStep2'])->name('student-update-step-2')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_3', [DashboardController::class, 'editStudentStep3'])->name('student-edit-step-3')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_3', [DashboardController::class, 'updateStudentStep3'])->name('student-update-step-3')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_4', [DashboardController::class, 'editStudentStep4'])->name('student-edit-step-4')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_4', [DashboardController::class, 'updateStudentStep4'])->name('student-update-step-4')->middleware('auth:web');
    Route::delete('/student/{student}', [DashboardController::class, 'deleteStudent'])->name('student-delete')->middleware('auth:web');

    // Application
    Route::post('/generate/card', [DashboardController::class, 'generateCard'])->name('root-generate-card')->middleware('auth:web');
    Route::get('/all/card', [DashboardController::class, 'allCard'])->name('root-all-card')->middleware('auth:web');
    Route::get('/used/card', [DashboardController::class, 'usedCard'])->name('root-used-card')->middleware('auth:web');
    Route::get('/all/{card}/print', [DashboardController::class, 'printCard'])->name('root-print-card')->middleware('auth:web');
    Route::get('/application', [DashboardController::class, 'application'])->name('root-application')->middleware('auth:web');
    Route::get('/allapplication', [DashboardController::class, 'allApplication'])->name('all-application')->middleware('auth:web');
    Route::get('/check-payment', [DashboardController::class, 'checkPayment'])->name('check-payment')->middleware('auth:web');
    Route::get('/check-payment/{check_payment}/edit', [DashboardController::class, 'checkPaymentEdit'])->name('check-payment-edit')->middleware('auth:web');
    Route::patch('/check-payment/{check_payment}/update', [DashboardController::class, 'checkPaymentUpdate'])->name('check-payment-update')->middleware('auth:web');
    Route::get('/check-application', [DashboardController::class, 'checkApplication'])->name('check-application')->middleware('auth:web');
    Route::get('/check-application/{check_application}/edit', [DashboardController::class, 'checkApplicationEdit'])->name('check-application-edit')->middleware('auth:web');
    Route::patch('/check-application/{check_application}/update', [DashboardController::class, 'checkApplicationUpdate'])->name('check-application-update')->middleware('auth:web');
    Route::patch('/check-application/{check_application}/course', [DashboardController::class, 'checkApplicationChangeCourse'])->name('check-application-change-course')->middleware('auth:web');
    Route::get('/check-admission', [DashboardController::class, 'checkAdmission'])->name('check-admission')->middleware('auth:web');
    
    // Registration
    Route::get('/registration', [DashboardController::class, 'registration'])->name('root-registration')->middleware('auth:web');
    Route::post('/registration-create', [DashboardController::class, 'createRegistration'])->name('registration-create')->middleware('auth:web');
    Route::post('/student-registration-create', [DashboardController::class, 'createRegistrationStudent'])->name('student-registration-create')->middleware('auth:web');
    Route::get('/allregistration', [DashboardController::class, 'allRegistration'])->name('all-registration')->middleware('auth:web');
    Route::get('/check-payment-session', [DashboardController::class, 'checkPaymentSession'])->name('check-payment-session')->middleware('auth:web');
    Route::get('/check-payment-session/{check_payment}/edit', [DashboardController::class, 'checkPaymentSessionEdit'])->name('check-payment-session-edit')->middleware('auth:web');
    Route::patch('/check-payment-session/{check_payment}/update', [DashboardController::class, 'checkPaymentSessionUpdate'])->name('check-payment-session-update')->middleware('auth:web');
    Route::get('/check-payment-semester', [DashboardController::class, 'checkPaymentSemester'])->name('check-payment-semester')->middleware('auth:web');
    Route::get('/check-payment-semester/{check_payment}/edit', [DashboardController::class, 'checkPaymentSemesterEdit'])->name('check-payment-semester-edit')->middleware('auth:web');
    Route::patch('/check-payment-semester/{check_payment}/update', [DashboardController::class, 'checkPaymentSemesterUpdate'])->name('check-payment-semester-update')->middleware('auth:web');
    Route::get('/registration/{registration}/edit', [DashboardController::class, 'editRegistration'])->name('registration-edit')->middleware('auth:web');
    Route::patch('/registration/{registration}/update', [DashboardController::class, 'updateRegistration'])->name('registration-update')->middleware('auth:web');
    Route::delete('/registration/{registration}', [DashboardController::class, 'deleteRegistration'])->name('registration-delete')->middleware('auth:web');

    // Calendar
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('root-calendar')->middleware('auth:web');
    Route::post('/calendar-create', [DashboardController::class, 'createCalendar'])->name('calendar-create')->middleware('auth:web');
    Route::get('/allcalendar', [DashboardController::class, 'allCalendar'])->name('all-calendar')->middleware('auth:web');
    Route::get('/calendar/{calendar}/edit', [DashboardController::class, 'editCalendar'])->name('calendar-edit')->middleware('auth:web');
    Route::patch('/calendar/{calendar}/update', [DashboardController::class, 'updateCalendar'])->name('calendar-update')->middleware('auth:web');
    Route::delete('/calendar/{calendar}', [DashboardController::class, 'deleteCalendar'])->name('calendar-delete')->middleware('auth:web');
    
    // Timetable
    Route::get('/timetable', [DashboardController::class, 'timetable'])->name('root-timetable')->middleware('auth:web');
    Route::post('/timetable-create', [DashboardController::class, 'createTimetable'])->name('timetable-create')->middleware('auth:web');
    Route::get('/alltimetable', [DashboardController::class, 'allTimetable'])->name('all-timetable')->middleware('auth:web');
    Route::get('/timetable/{timetable}/show', [DashboardController::class, 'showTimetable'])->name('timetable-show')->middleware('auth:web');
    Route::get('/timetable/{timetable}/edit', [DashboardController::class, 'editTimetable'])->name('timetable-edit')->middleware('auth:web');
    Route::patch('/timetable/{timetable}/update', [DashboardController::class, 'updateTimetable'])->name('timetable-update')->middleware('auth:web');
    Route::delete('/timetable/{timetable}', [DashboardController::class, 'deleteTimetable'])->name('timetable-delete')->middleware('auth:web');

    // EXAM
    Route::get('/exam', [DashboardController::class, 'exam'])->name('root-exam')->middleware('auth:web');
    Route::post('/exam-create', [DashboardController::class, 'createExam'])->name('exam-create')->middleware('auth:web');
    Route::get('/allexam', [DashboardController::class, 'allExam'])->name('all-exam')->middleware('auth:web');
    Route::get('/exam/{exam}/edit', [DashboardController::class, 'editExam'])->name('exam-edit')->middleware('auth:web');
    Route::patch('/exam/{exam}/update', [DashboardController::class, 'updateExam'])->name('exam-update')->middleware('auth:web');
    Route::delete('/exam/{exam}', [DashboardController::class, 'deleteExam'])->name('exam-delete')->middleware('auth:web');
    
    // RESULT
    Route::get('/result', [DashboardController::class, 'result'])->name('root-result')->middleware('auth:web');
    Route::post('/result-create', [DashboardController::class, 'createResult'])->name('result-create')->middleware('auth:web');
    Route::get('/insert-result', [DashboardController::class, 'insertResult'])->name('insert-result')->middleware('auth:web');
    Route::post('/submit-result', [DashboardController::class, 'submitResult'])->name('submit-result')->middleware('auth:web');
    Route::get('/allresult', [DashboardController::class, 'allResult'])->name('all-result')->middleware('auth:web');
    Route::get('/result/{semester}/show', [DashboardController::class, 'showResult'])->name('result-show')->middleware('auth:web');
    Route::get('/result/{result}/edit', [DashboardController::class, 'editResult'])->name('result-edit')->middleware('auth:web');
    Route::patch('/result/{result}/update', [DashboardController::class, 'updateResult'])->name('result-update')->middleware('auth:web');
    Route::delete('/result/{result}', [DashboardController::class, 'deleteResult'])->name('result-delete')->middleware('auth:web');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('root-settings')->middleware('auth:web');
    Route::post('/settings-name', [DashboardController::class, 'settingsName'])->name('settings-name')->middleware('auth:web');
    Route::post('/settings-email', [DashboardController::class, 'settingsEmail'])->name('settings-email')->middleware('auth:web');
    Route::post('/settings-photo', [DashboardController::class, 'settingsPhoto'])->name('settings-photo')->middleware('auth:web');
    Route::post('/settings-password', [DashboardController::class, 'settingsPassword'])->name('settings-password')->middleware('auth:web');

});

// STUDENTS 
Route::group(['prefix' => 'student'], function () {
    Route::middleware([GlobalData::class])->group(function(){
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student-dashboard')->middleware('auth:students');
    
        // PAYMENT
        Route::get('/payment', [StudentController::class, 'payment'])->name('student-payment')->middleware('auth:students');
        Route::post('/payment/submit', [StudentController::class, 'paymentSemester'])->name('student-payment-semester')->middleware('auth:students');
        
        // COURSE
        Route::get('/course', [StudentController::class, 'course'])->name('student-course-reg')->middleware('auth:students');
        Route::get('/course/registration', [StudentController::class, 'courseRegistration'])->name('student-course-registration')->middleware('auth:students');
        Route::post('/course/registration/submit', [StudentController::class, 'courseRegistrationSubmit'])->name('student-course-registration-submit')->middleware('auth:students');
        Route::post('/course/registration/submit/completed', [StudentController::class, 'courseRegistrationCompleted'])->name('student-course-registration-completed')->middleware('auth:students');
        Route::post('/course/registration/submit/check', [StudentController::class, 'courseRegistrationCheck'])->name('student-course-registration-check')->middleware('auth:students');
        Route::post('/course/registration/submit/print', [StudentController::class, 'courseRegistrationPrint'])->name('student-course-registration-print')->middleware('auth:students');
        Route::delete('/course/registration/{course}', [StudentController::class, 'courseRegistrationDelete'])->name('student-course-registration-delete')->middleware('auth:students');
        
        // TIMETABLE
        Route::get('/timetable', [StudentController::class, 'timetable'])->name('student-timetable')->middleware('auth:students');
        
        // RESULT
        Route::get('/result', [StudentController::class, 'result'])->name('student-result')->middleware('auth:students');
        Route::post('/result/check', [StudentController::class, 'resultCheck'])->name('student-result-check')->middleware('auth:students');
        Route::post('/result/submit/print', [StudentController::class, 'resultPrint'])->name('student-result-print')->middleware('auth:students');
        

        // SETTINGS
        Route::get('/settings', [StudentController::class, 'settings'])->name('student-settings')->middleware('auth:students');
        Route::post('/settings-photo', [StudentController::class, 'settingsPhoto'])->name('student-settings-photo')->middleware('auth:students');
        Route::post('/settings-password', [StudentController::class, 'settingsPassword'])->name('student-settings-password')->middleware('auth:students');
        
    });
});