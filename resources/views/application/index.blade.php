@extends('layouts.app')

@section('page-title')
    Application - MICOHSAT
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white lg:col-span-1 col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.application_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="lg:col-span-5 col-span-5 mt-2">
            <div class="ml-4 mr-8 mb-4">    
                <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
                <!-- Stat  -->
                <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                    <div>
                        <div class="font-medium mb-1 lg:text-lg">Welcome, </div>
                        <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                            <div class="font-medium mb-1 text-sm">
                                {{ Auth::guard('application')->user()->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:grid grid-cols-3 gap-3 lg:ml-4 lg:mr-8 mb-4 hidden">
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 lg:text-lg">Application:</div>
                            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                            <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    {{ Auth::guard('application')->user()->checkPaymentStatus() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 lg:text-lg">Application:</div>
                            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                                <div class="font-medium mb-1 text-sm">Application Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    {{ Auth::guard('application')->user()->checkRegistrationStatus() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 lg:text-lg">Admission:</div>
                            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                                <div class="font-medium mb-1 text-sm">Admission Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    {{ Auth::guard('application')->user()->applicantAdmissionStatus() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upload Receipt -->
                @if(Auth::guard('application')->user()->checkPayment() == 0)
                    <div class="bg-white lg:py-24 py-8 px-6 text-gray-600 lg:ml-4 lg:mr-8 mb-5 rounded col-span-2">
                        <form action="{{ route('application-payment-receipt') }}" method="POST" class="lg:w-2/3 w-full" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Upload your Application payment receipt {{ Auth::guard('application')->user()->name }}</h1>
                            @csrf
                                <div class="lg:flex my-5">
                                    <label for="semester" class="text-lg font-medium border-b-4 border-green-700 lg:ml-4">Application Payment Receipt</label><br><br>
                                    <input class="input-field" type="file" name="receipt">
                                    @error('receipt')
                                        {{$message}}
                                    @enderror
                                </div>     
                                <div class="text-center my-4">
                                    <button class="submit-btn">SUBMIT</button>
                                </div>
                        </form>
                    </div>
                @endif  
                <!-- Upload Document  -->
                @if(Auth::guard('application')->user()->checkApplicationProgress() == 1)
                    <div class="bg-white lg:py-6 py-3 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <div class="mb-4 lg:flex grid lg:text-sm text-xs mt-5">
                            <a id="indicatorNavOne" href="#" class="active-nav-indicator">
                                <span>Step 1: Personal Data /</span>
                            </a>
                            <a id="indicatorNavTwo" href="#">
                                <span>Step 2: Next of Kin /</span>
                            </a>
                            <a id="indicatorNavThree" href="#">
                                <span>Step 3: Programme and Photo /</span>
                            </a>
                            <a id="indicatorNavFour"  href="#">
                                <span>Step 4: 0' Level Result  /</span>
                            </a>
                            <a id="indicatorNavFive"  href="#">
                                <span>Step 5: A' Level Result  /</span>
                            </a>
                        </div>
                        <form action="{{ route('application-registration-form') }}" method="POST" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Complete Your Registration {{ Auth::guard('application')->user()->name }}</h1>
                            @csrf
                            <!-- Step 1  -->
                            <div id="stepOne">
                                <!-- Gender  -->
                                <div class="my-4">
                                    <label for="gender" class="input-title">Gender</label><br>
                                    <select required name="gender" class="input-field">
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- DOB  -->
                                <div class="my-4">
                                    <label for="dob" class="input-title">Date of Birth</label><br>
                                    <input required type="date" name="dob" placeholder="Date of Birth" class="input-field">
                                    @error('dob')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Marital Status  -->
                                <div class="my-4">
                                    <label for="marital_status" class="input-title">Marital Status</label><br>
                                    <select required name="marital_status" class="input-field">
                                        <option value=""></option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                    @error('marital_status')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Phone  -->
                                <div class="my-4">
                                    <label for="phone" class="input-title">Phone</label><br>
                                    <input required type="text" name="phone" placeholder="Phone" class="input-field">
                                    @error('phone')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Address  -->
                                <div class="my-4">
                                    <label for="address" class="input-title">Address</label><br>
                                    <input required type="text" name="address" placeholder="Address" class="input-field">
                                    @error('address')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- City  -->
                                <div class="my-4">
                                    <label for="city" class="input-title">City</label><br>
                                    <input required type="text" name="city" placeholder="City" class="input-field">
                                    @error('city')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- LGA  -->
                                <div class="my-4">
                                    <label for="lga" class="input-title">LGA</label><br>
                                    <input required type="text" name="lga" placeholder="LGA" class="input-field">
                                    @error('lga')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- State  -->
                                <div class="my-4">
                                    <label for="state" class="input-title">State</label><br>
                                    <input required type="text" name="state" placeholder="State" class="input-field">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Country  -->
                                <div class="my-4">
                                    <label for="country" class="input-title">Country</label><br>
                                    <input required type="text" name="country" placeholder="Country" class="input-field">
                                    @error('country')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <!-- step 2 -->
                            <div id="stepTwo" class="hidden">
                                <!-- Name  -->
                                <div class="my-4">
                                    <label for="kin_name" class="input-title">Name</label><br>
                                    <input required type="text" name="kin_name" placeholder="Name" class="input-field">
                                    @error('kin_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Relationship  -->
                                <div class="my-4">
                                    <label for="kin_relation" class="input-title">Relationship</label><br>
                                    <input required type="text" name="kin_relation" placeholder="Relationship" class="input-field">
                                    @error('kin_relation')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Phone  -->
                                <div class="my-4">
                                    <label for="kin_phone" class="input-title">Phone</label><br>
                                    <input required type="text" name="kin_phone" placeholder="Phone" class="input-field">
                                    @error('kin_phone')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Address  -->
                                <div class="my-4">
                                    <label for="kin_address" class="input-title">Address</label><br>
                                    <input required type="text" name="kin_address" placeholder="Address" class="input-field">
                                    @error('kin_address')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- City  -->
                                <div class="my-4">
                                    <label for="kin_city" class="input-title">City</label><br>
                                    <input required type="text" name="kin_city" placeholder="City" class="input-field">
                                    @error('kin_city')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- LGA  -->
                                <div class="my-4">
                                    <label for="kin_lga" class="input-title">LGA</label><br>
                                    <input required type="text" name="kin_lga" placeholder="LGA" class="input-field">
                                    @error('kin_lga')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- State  -->
                                <div class="my-4">
                                    <label for="kin_state" class="input-title">State</label><br>
                                    <input required type="text" name="kin_state" placeholder="State" class="input-field">
                                    @error('kin_state')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Country  -->
                                <div class="my-4">
                                    <label for="kin_country" class="input-title">Country</label><br>
                                    <input required type="text" name="kin_country" placeholder="Country" class="input-field">
                                    @error('kin_country')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <!-- step 3 -->
                            <div id="stepThree" class="hidden">
                                <!-- Photo  -->
                                <div class="my-4">
                                    <label for="name" class="text-lg font-medium border-b-4 border-green-700">Applicant Photo</label><br>
                                    <div class="grid grid-cols-2 gap-2 items-center mt-3">
                                        <div>
                                            <input required type="file" name="photo">
                                        </div>
                                    </div>
                                    @error('photo')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Programme  -->
                                <div class="my-4">
                                    <label for="programme" class="input-title">Programme</label><br>
                                    <div>
                                        <select required name="programme" class="input-field">
                                            <option></option>
                                            @foreach($programmes as $programme)
                                                <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('programme')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Step 4 -->
                            <div id="stepFour" class="hidden">
                                <div class="border-b-2 my-2">
                                    <label for="subject" class="input-title">Subject</label><br>
                                    <div class="lg:flex grid">
                                        <input type="text" name="subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">
                                        <input type="text" name="subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                        @error('subject')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div id="subjectSection" class="my-4"></div>
                                <div id="addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Subject + </div>
                                <br><br>
                            </div>
                            <!-- Step 5 -->
                            <div id="stepFive" class="hidden">
                                <div class="border-b-2 my-2">
                                    <label for="subject" class="input-title">Subject</label><br>
                                    <div class="lg:flex">
                                        <input type="text" name="a_level_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">
                                        <input type="text" name="a_level_subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                        @error('subject')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div id="aLevelSubjectSection" class="my-4"></div>
                                <div id="aLeveladdField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Subject + </div>
                                <br><br>
                                <div class="flex items-center my-4">
                                    <span><input type="checkbox" name="agree" id="agreeBtn"></span>
                                    <span class="ml-1 text-xs">I agree that whatever Information I given is correct to the best of my understanding and I will be held accountable for any wrong Information given.</span>
                                </div>
                                <div id="submitBtn" class="text-center my-4 hidden">
                                    <button class="submit-btn">SUBMIT</button>
                                </div>
                            </div>
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <div id="stepOneIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 1: Personal Data</div>
                                <div id="stepTwoIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 2: Next of Kin</div>
                                <div id="stepThreeIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 3: Programme & Photo</div>
                                <div id="stepFourIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 4: 0' Level Result</div>
                                <div id="stepFiveIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 5: A' Level Result</div>
                            </div>
                        </form>
                    </div>                    
                    <script>
                        // Add Subject 
                        let addField = document.querySelector('#addField')
                        let subjectSection = document.querySelector('#subjectSection')
                        const divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<input type="text" name="subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                        '<input type="text" name="subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                    '</div>'+
                                '</div>'

                        addField.addEventListener('click', ()=>{
                            subjectSection.insertAdjacentHTML('beforeend', divContent)
                        })

                        // Add Subject A Level 
                        let aLeveladdField = document.querySelector('#aLeveladdField')
                        let aLevelSubjectSection = document.querySelector('#aLevelSubjectSection')
                        const a_level_divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<input type="text" name="a_level_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                        '<input type="text" name="a_level_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                    '</div>'+
                                '</div>'

                        aLeveladdField.addEventListener('click', ()=>{
                            aLevelSubjectSection.insertAdjacentHTML('beforeend', divContent)
                        })

                        //Agree
                        let agreeBtn = document.querySelector('#agreeBtn')
                        let submitBtn = document.querySelector('#submitBtn')
                        
                        agreeBtn.addEventListener('click', ()=>{
                            if(submitBtn.classList.contains('hidden')){
                                submitBtn.classList.remove('hidden');
                            }else{
                                submitBtn.classList.add('hidden');
                            }
                        })

                        //Indicator
                        let indicator = document.querySelector('#indicator')
                        let stepOneIndicator = document.querySelector('#stepOneIndicator')
                        let stepTwoIndicator = document.querySelector('#stepTwoIndicator')
                        let stepThreeIndicator = document.querySelector('#stepThreeIndicator')
                        let stepFourIndicator = document.querySelector('#stepFourIndicator')
                        let stepFiveIndicator = document.querySelector('#stepFiveIndicator')
                        
                        // Steps 
                        let stepOne = document.querySelector('#stepOne')
                        let stepTwo = document.querySelector('#stepTwo')
                        let stepThree = document.querySelector('#stepThree')
                        let stepFour = document.querySelector('#stepFour')
                        let stepFive = document.querySelector('#stepFive')
                        
                        // NavIndicator 
                        let indicatorNavOne = document.querySelector('#indicatorNavOne')
                        let indicatorNavTwo = document.querySelector('#indicatorNavTwo')
                        let indicatorNavThree = document.querySelector('#indicatorNavThree')
                        let indicatorNavFour = document.querySelector('#indicatorNavFour')
                        let indicatorNavFive = document.querySelector('#indicatorNavFive')
                        
                        stepOneIndicator.addEventListener('click', ()=>{
                            
                            if(stepOne.classList.contains('hidden')){
                                stepOne.classList.remove('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                            
                                indicatorNavOne.classList.add('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                            
                            }
                            
                        })

                        stepTwoIndicator.addEventListener('click', ()=>{
                            
                            if(stepTwo.classList.contains('hidden')){
                                stepTwo.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                
                                indicatorNavTwo.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                            }

                        })

                        stepThreeIndicator.addEventListener('click', ()=>{
                            if(stepThree.classList.contains('hidden')){
                                stepThree.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                
                                indicatorNavThree.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                            
                            }

                        })

                        stepFourIndicator.addEventListener('click', ()=>{
                            if(stepFour.classList.contains('hidden')){
                                stepFour.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                
                                indicatorNavFour.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                            
                            }
                        })

                        stepFiveIndicator.addEventListener('click', ()=>{
                            if(stepFive.classList.contains('hidden')){
                                stepFive.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                
                                indicatorNavFive.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                            
                            }
                        })

                    </script>
                @endif
                <!-- Print Slip  -->
                @if(Auth::guard('application')->user()->checkApplicationProgress() == 2)
                    <div class="bg-white py-6 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <a href="{{ route('print-slip') }}">
                            <div class="bg-green-700 text-white lg:w-1/2 rounded mx-auto text-center p-3 cursor-pointer text-xs lg:text-sm">
                                Print Acknowledge Slip
                            </div>
                        </a>
                    </div>
                @endif
                <!-- Admission Letter  -->
                @if(Auth::guard('application')->user()->checkApplicationProgress() == 3)
                    <div class="bg-white py-6 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <a href="{{ route('print-slip') }}">
                            <div class="bg-green-700 text-white lg:w-1/2 rounded mx-auto text-center p-3 cursor-pointer text-xs lg:text-sm">
                                Print Acknowledge Slip
                            </div>
                        </a>
                    </div>
                    <div class="bg-white py-6 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <a href="{{ route('print-admission') }}">
                            <div class="bg-green-700 text-white lg:w-1/2 rounded mx-auto text-center p-3 cursor-pointer text-xs lg:text-sm">
                                Print Admission Letter
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <!-- System Password  -->
        @include('application.system_password')
    </div>
@endsection