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
                @include('includes.stats')
                <!-- Upload Receipt -->
                @if(Auth::guard('application')->user()->checkPayment() == 0)
                    <div class="bg-white lg:py-24 py-8 px-6 text-gray-600 lg:ml-4 lg:mr-8 mb-5 rounded col-span-2">
                        <form action="{{ route('application-payment-receipt') }}" method="POST" class="lg:w-2/3 w-full" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Enter Your Application PIN {{ Auth::guard('application')->user()->name }}</h1>
                            @csrf
                                <div class="lg:flex my-5">
                                    <label for="semester" class="text-lg font-medium border-b-4 border-green-700 lg:ml-4">Application PIN</label><br><br>
                                    <input autofocus class="input-field" type="text" name="receipt">
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
                            <a id="indicatorNavFour"  href="#">
                                <span>Step 2: Programme and Photo  /</span>
                            </a>
                            <a id="indicatorNavFive"  href="#">
                                <span>Step 3: 0' Level Result  /</span>
                            </a>
                            <a id="indicatorNavSix"  href="#">
                                <span>Step 4: Additional Qualifications  /</span>
                            </a>
                            <a id="indicatorNavTwo" href="#">
                                <span>Step 5: Next of Kin /</span>
                            </a>
                            <a id="indicatorNavThree" href="#">
                                <span>Step 6: Sponsor</span>
                            </a>
                        </div>
                        <h1 class="py-2 font-semibold">Complete Your Registration {{ Auth::guard('application')->user()->name }}</h1>
                        <form action="{{ route('application-registration-form') }}" method="POST" enctype="multipart/form-data">
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
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <button disabled class="bg-gray-400 text-white py-3 px-12 rounded mb-3 cursor-pointer">Back Step 1: Personal Data</button>
                                <button class="bg-green-700 text-white py-3 px-12 rounded mb-3 cursor-pointer">Next Step 2: Programme & Photo</button>
                            </div>
                        </form>
                    </div>                    
                    <script>
                        // Add One Subject 
                        let one_addField = document.querySelector('#one_addField')
                        let one_subjectSection = document.querySelector('#one_subjectSection')
                        const divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<select type="text" name="one_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                                '<option value=""></option>'+
                                                '<option value="COMMERCE">COMMERCE</option>'+
                                                '<option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>'+
                                                '<option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>'+
                                                '<option value="ECONOMICS">ECONOMICS</option>'+
                                                '<option value="GEOGRAPHY">GEOGRAPHY</option>'+
                                                '<option value="GOVERNMENT">GOVERNMENT</option>'+
                                                '<option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>'+
                                                '<option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>'+
                                                '<option value="CIVIC EDUCATION">CIVIC EDUCATION</option>'+
                                                '<option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>'+
                                                '<option value="HAUSA">HAUSA</option>'+
                                                '<option value="IGBO">IGBO</option>'+
                                                '<option value="YORUBA">YORUBA</option>'+
                                                '<option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>'+
                                                '<option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>'+
                                                '<option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>'+
                                                '<option value="BIOLOGY">BIOLOGY</option>'+
                                                '<option value="CHEMISTRY">CHEMISTRY</option>'+
                                                '<option value="PHYSICS">PHYSICS</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="one_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        one_addField.addEventListener('click', ()=>{
                            one_subjectSection.insertAdjacentHTML('beforeend', divContent)
                        })

                        // Add Second Subject 
                        let two_addField = document.querySelector('#two_addField')
                        let two_SubjectSection = document.querySelector('#two_SubjectSection')
                        const two_divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="two_subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<select type="text" name="two_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                                '<option value=""></option>'+
                                                '<option value="COMMERCE">COMMERCE</option>'+
                                                '<option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>'+
                                                '<option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>'+
                                                '<option value="ECONOMICS">ECONOMICS</option>'+
                                                '<option value="GEOGRAPHY">GEOGRAPHY</option>'+
                                                '<option value="GOVERNMENT">GOVERNMENT</option>'+
                                                '<option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>'+
                                                '<option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>'+
                                                '<option value="CIVIC EDUCATION">CIVIC EDUCATION</option>'+
                                                '<option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>'+
                                                '<option value="HAUSA">HAUSA</option>'+
                                                '<option value="IGBO">IGBO</option>'+
                                                '<option value="YORUBA">YORUBA</option>'+
                                                '<option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>'+
                                                '<option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>'+
                                                '<option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>'+
                                                '<option value="BIOLOGY">BIOLOGY</option>'+
                                                '<option value="CHEMISTRY">CHEMISTRY</option>'+
                                                '<option value="PHYSICS">PHYSICS</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="two_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        two_addField.addEventListener('click', ()=>{
                            two_subjectSection.insertAdjacentHTML('beforeend', two_divContent)
                        })

                        // Add Qualification 
                        let qualificationaddField = document.querySelector('#qualificationaddField')
                        let qualificationSection = document.querySelector('#qualificationSection')
                        const qualification_divContent = 
                            '<div class="border-b-2 my-2">'+
                                '<label for="subject" class="input-title">Qualification</label><br>'+
                                    '<div class="lg:grid">'+
                                        '<input type="text" name="school[]" placeholder="Subject Attended" class="input-field mb-2 mr-10">'+
                                        '<input type="text" name="certificate[]" placeholder="Certificate Obtained" class="input-field mb-2">'+
                                        '<input type="text" name="year[]" placeholder="Year Graduated" class="input-field mb-2">'+
                                    '</div>'+
                                '</div>'

                            qualificationaddField.addEventListener('click', ()=>{
                            qualificationSection.insertAdjacentHTML('beforeend', qualification_divContent)
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
                        let stepSixIndicator = document.querySelector('#stepSixIndicator')
                        
                        // Steps 
                        let stepOne = document.querySelector('#stepOne')
                        let stepTwo = document.querySelector('#stepTwo')
                        let stepThree = document.querySelector('#stepThree')
                        let stepFour = document.querySelector('#stepFour')
                        let stepFive = document.querySelector('#stepFive')
                        let stepSix = document.querySelector('#stepSix')
                        
                        // NavIndicator 
                        let indicatorNavOne = document.querySelector('#indicatorNavOne')
                        let indicatorNavTwo = document.querySelector('#indicatorNavTwo')
                        let indicatorNavThree = document.querySelector('#indicatorNavThree')
                        let indicatorNavFour = document.querySelector('#indicatorNavFour')
                        let indicatorNavFive = document.querySelector('#indicatorNavFive')
                        let indicatorNavSix = document.querySelector('#indicatorNavSix')
                        
                        stepOneIndicator.addEventListener('click', ()=>{
                            
                            if(stepOne.classList.contains('hidden')){
                                stepOne.classList.remove('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                stepSix.classList.add('hidden');
                            
                                indicatorNavOne.classList.add('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                                indicatorNavSix.classList.remove('active-nav-indicator')
                            
                            }
                            
                        })

                        stepTwoIndicator.addEventListener('click', ()=>{
                            
                            if(stepTwo.classList.contains('hidden')){
                                stepTwo.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                stepSix.classList.add('hidden');
                                
                                indicatorNavTwo.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                                indicatorNavSix.classList.remove('active-nav-indicator')
                            }

                        })

                        stepThreeIndicator.addEventListener('click', ()=>{
                            if(stepThree.classList.contains('hidden')){
                                stepThree.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                stepSix.classList.add('hidden');
                                
                                indicatorNavThree.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                                indicatorNavSix.classList.remove('active-nav-indicator')
                            
                            }

                        })

                        stepFourIndicator.addEventListener('click', ()=>{
                            if(stepFour.classList.contains('hidden')){
                                stepFour.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                stepSix.classList.add('hidden');
                                
                                indicatorNavFour.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                                indicatorNavSix.classList.remove('active-nav-indicator')
                            
                            }
                        })

                        stepFiveIndicator.addEventListener('click', ()=>{
                            if(stepFive.classList.contains('hidden')){
                                stepFive.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepSix.classList.add('hidden');
                                
                                indicatorNavFive.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavSix.classList.remove('active-nav-indicator')
                            
                            }
                        })

                        stepSixIndicator.addEventListener('click', ()=>{
                            if(stepSix.classList.contains('hidden')){
                                stepSix.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                stepFour.classList.add('hidden');
                                stepFive.classList.add('hidden');
                                
                                indicatorNavSix.classList.add('active-nav-indicator')
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                                indicatorNavFour.classList.remove('active-nav-indicator')
                                indicatorNavFive.classList.remove('active-nav-indicator')
                            
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