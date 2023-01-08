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
                @include('includes.stats') 
                <!-- Upload Document  -->
                @if(Auth::guard('application')->user()->checkApplicationProgress() == 1)
                    <div class="bg-white lg:py-6 py-3 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <div class="mb-4 lg:flex grid lg:text-sm text-xs mt-5">
                            <a id="indicatorNavOne" href="#">
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
                            <a id="indicatorNavThree" href="#" class="active-nav-indicator">
                                <span>Step 6: Sponsor</span>
                            </a>
                        </div>
                        <h1 class="py-2 font-semibold">Complete Your Registration {{ Auth::guard('application')->user()->name }}</h1>
                        <form action="{{ route('application-registration-sponsor-submit') }}" method="POST" enctype="multipart/form-data">
                        <h1 class="py-2 font-semibold">Sponsor</h1>
                            @csrf
                            <!-- step 6 -->
                            <div id="stepThree">
                                <!-- Name  -->
                                <div class="my-4">
                                    <label for="sponsor_name" class="input-title">Name</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->sponsor_name : '' }}" type="text" name="sponsor_name" placeholder="Name" class="input-field">
                                    @error('sponsor_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Phone  -->
                                <div class="my-4">
                                    <label for="sponsor_phone" class="input-title">Phone</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->sponsor_phone : '' }}" type="text" name="sponsor_phone" placeholder="Phone" class="input-field">
                                    @error('sponsor_phone')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div class="flex items-center my-4">
                                    <span><input type="checkbox" name="agree" id="agreeBtn"></span>
                                    <span class="ml-4 text-sm">
                                        I hereby delared that all the particulars given are correct to the best of my knowledge. I will agree with the penalty to be prosecuted if discovered at any point that the information given is false. If admitted I will be bound by the rules and regulations of MICOHSAT.
                                    </span>
                                </div>
                            </div>
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <a href="{{ route('application-registration-kin') }}" class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Back Step 5: Next of Kin</a>
                                <button id="submitBtn" class="hidden bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">SUBMIT</button>
                            </div>
                        </form>
                    </div>                    
                    <script>
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
                    </script>
                @endif
            </div>
        </div>
        <!-- System Password  -->
        @include('application.system_password')
    </div>
@endsection