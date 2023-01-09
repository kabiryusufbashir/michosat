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
                            <a id="indicatorNavSix"  href="#" class="active-nav-indicator">
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
                        <form action="{{ route('application-registration-qualification-submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 4 -->
                            <div id="stepSix">
                                <!-- A Level Photo  -->
                                <!-- <div class="my-4">
                                    <label for="name" class="text-lg font-medium border-b-4 border-green-700">Upload A' Level Result</label><br>
                                    <div class="grid grid-cols-2 gap-2 items-center mt-3">
                                        <div>
                                            <input type="file" name="applicant_a_level_result">
                                        </div>
                                    </div>
                                    @error('applicant_a_level_result')
                                        {{$message}}
                                    @enderror
                                </div> -->
                                <div class="border-b-2 my-2">
                                    @if(count($qualifications) > 0)
                                    <label for="subject" class="input-title">Additional Qualification</label><br>
                                        @foreach($qualifications as $qualification)
                                            <div class="lg:grid">
                                                <input type="text" value="{{ $qualification->school }}" name="school[]" placeholder="School Attended" class="input-field mb-2 mr-10">
                                                <input type="text" value="{{ $qualification->grade }}" name="grade[]" placeholder="Grade" class="input-field mb-2 mr-10">
                                                <input type="text" value="{{ $qualification->cgpa }}" name="cgpa[]" placeholder="CGPA" class="input-field mb-2 mr-10">
                                                <input type="text" value="{{ $qualification->certificate }}" name="certificate[]" placeholder="Certificate Obtained" class="input-field mb-2">
                                                <input type="text" value="{{ $qualification->year }}" name="year[]" placeholder="Year Graduated" class="input-field mb-2">
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="lg:grid">
                                        <input type="text" name="school[]" placeholder="Subject Attended" class="input-field mb-2 mr-10">
                                        <input type="text" name="grade[]" placeholder="Grade" class="input-field mb-2 mr-10">
                                        <input type="text" name="cgpa[]" placeholder="CGPA" class="input-field mb-2 mr-10">
                                        <input type="text" name="certificate[]" placeholder="Certificate Obtained" class="input-field mb-2">
                                        <input type="text" name="year[]" placeholder="Year Graduated" class="input-field mb-2">
                                        @error('qualification')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    @endif
                                </div>
                                <div id="qualificationSection" class="my-4"></div>
                                <div id="qualificationaddField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Qualification + </div>
                            </div>
                            <br><br>
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <a href="{{ route('application-registration-result') }}" class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Back Step 3: 0' Level Result</a>
                                <button class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Next Step 5: Next of Kin</button>
                            </div>
                        </form>
                    </div>                    
                    <script>
                        // Add Qualification 
                        let qualificationaddField = document.querySelector('#qualificationaddField')
                        let qualificationSection = document.querySelector('#qualificationSection')
                        const qualification_divContent = 
                            '<div class="border-b-2 my-2">'+
                                '<label for="subject" class="input-title">Additional Qualification</label><br>'+
                                    '<div class="lg:grid">'+
                                        '<input type="text" name="school[]" placeholder="School Attended" class="input-field mb-2 mr-10">'+
                                        '<input type="text" name="grade[]" placeholder="Grade" class="input-field mb-2">'+
                                        '<input type="text" name="cgpa[]" placeholder="CGPA" class="input-field mb-2">'+
                                        '<input type="text" name="certificate[]" placeholder="Certificate Obtained" class="input-field mb-2">'+
                                        '<input type="text" name="year[]" placeholder="Year Graduated" class="input-field mb-2">'+
                                    '</div>'+
                                '</div>'

                            qualificationaddField.addEventListener('click', ()=>{
                            qualificationSection.insertAdjacentHTML('beforeend', qualification_divContent)
                        })
                        
                    </script>
                @endif
            </div>
        </div>
        <!-- System Password  -->
        @include('application.system_password')
    </div>
@endsection