@extends('layouts.app')

@section('page-title')
    Application - MICOHSAT
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.application_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <div class="ml-4 mr-8 mb-4">    
                <!-- Stat  -->
                <div class="grid grid-cols-3 gap-3 ml-4 mr-8 mb-4">
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Application:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                            <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    {{ Auth::guard('application')->user()->checkPaymentStatus() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Registration:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                                <div class="font-medium mb-1 text-sm">Registration Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    Not Completed 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Admission:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                                <div class="font-medium mb-1 text-sm">Admission Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    Not Yet 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upload Receipt -->
                @if(Auth::guard('application')->user()->checkPayment() == 0)
                    <div class="bg-white lg:py-24 px-6 text-gray-600 ml-4 mr-8  mb-5 rounded col-span-2">
                        <form action="{{ route('application-payment-receipt') }}" method="POST" class="w-2/3" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Upload your Application payment receipt {{ Auth::guard('application')->user()->name }}</h1>
                            @csrf
                                <div class="flex my-5">
                                    <label for="semester" class="text-lg font-medium border-b-4 border-green-700 ml-4">Application Payment Receipt</label><br>
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
                    <div class="bg-white lg:py-6 px-6 text-gray-600 mb-5 ml-4 mr-8 rounded col-span-2">
                        <div class="mb-4">
                            <a id="indicatorNavOne" href="#" class="active-nav-indicator">
                                <span>Step 1: Personal Data /</span>
                            </a>
                            <a id="indicatorNavTwo" href="#">
                                <span>Step 2: Programme and Photo /</span>
                            </a>
                            <a id="indicatorNavThree"  href="#">
                                <span>Step 3: 0'Level Result  /</span>
                            </a>
                        </div>
                        <form action="{{ route('application-payment-receipt') }}" method="POST" enctype="multipart/form-data">
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
                                        <option value="Male">Single</option>
                                        <option value="Female">Married</option>
                                        <option value="Female">Divorced</option>
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
                                <!-- State  -->
                                <div class="my-4">
                                    <label for="state" class="input-title">State</label><br>
                                    <input required type="text" name="address" placeholder="State" class="input-field">
                                    @error('state')
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
                            </div>
                            <!-- step 2 -->
                            <div id="stepTwo" class="hidden">
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
                            <!-- Step 3  -->
                            <div id="stepThree" class="hidden">
                                <div class="border-b-2 my-2">
                                    <label for="subject" class="input-title">Subject</label><br>
                                    <div class="flex">
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
                                
                                <div class="text-center my-4">
                                    <button class="submit-btn">SUBMIT</button>
                                </div>
                            </div>
                            <!-- Indicator  -->
                            <div id="indicator" class="flex justify-around">
                                <div id="stepOneIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 1: Personal Data</div>
                                <div id="stepTwoIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 2: Programme & Photo</div>
                                <div id="stepThreeIndicator" class="bg-blue-800 text-white p-2 rounded mb-3 text-xs cursor-pointer">Step 3: 0' Level Result</div>
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
                                    '<div class="flex">'+
                                        '<input type="text" name="subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                        '<input type="text" name="subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                    '</div>'+
                                '</div>'

                        addField.addEventListener('click', ()=>{
                            subjectSection.insertAdjacentHTML('beforeend', divContent)
                        })

                        //Indicator
                        let indicator = document.querySelector('#indicator')
                        let stepOneIndicator = document.querySelector('#stepOneIndicator')
                        let stepTwoIndicator = document.querySelector('#stepTwoIndicator')
                        let stepThreeIndicator = document.querySelector('#stepThreeIndicator')
                        
                        // Steps 
                        let stepOne = document.querySelector('#stepOne')
                        let stepTwo = document.querySelector('#stepTwo')
                        let stepThree = document.querySelector('#stepThree')
                        
                        // NavIndicator 
                        let indicatorNavOne = document.querySelector('#indicatorNavOne')
                        let indicatorNavTwo = document.querySelector('#indicatorNavTwo')
                        let indicatorNavThree = document.querySelector('#indicatorNavThree')
                        
                        stepOneIndicator.addEventListener('click', ()=>{
                            
                            if(stepOne.classList.contains('hidden')){
                                stepOne.classList.remove('hidden');
                                stepTwo.classList.add('hidden');
                                stepThree.classList.add('hidden');
                            
                                indicatorNavOne.classList.add('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                            
                            }
                            
                        })

                        stepTwoIndicator.addEventListener('click', ()=>{
                            
                            if(stepTwo.classList.contains('hidden')){
                                stepTwo.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepThree.classList.add('hidden');
                                
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.add('active-nav-indicator')
                                indicatorNavThree.classList.remove('active-nav-indicator')
                            }

                        })

                        stepThreeIndicator.addEventListener('click', ()=>{
                            
                            if(stepThree.classList.contains('hidden')){
                                stepThree.classList.remove('hidden');
                                stepOne.classList.add('hidden');
                                stepTwo.classList.add('hidden');
                                
                                indicatorNavOne.classList.remove('active-nav-indicator')
                                indicatorNavTwo.classList.remove('active-nav-indicator')
                                indicatorNavThree.classList.add('active-nav-indicator')
                            
                            }

                        })
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection