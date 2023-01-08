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
                            <a id="indicatorNavFour"  href="#" class="active-nav-indicator">
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
                        <form action="{{ route('application-registration-photo-submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- step 2 -->
                            <div id="stepFour">
                                <!-- Photo  -->
                                <div class="my-4">
                                    <label for="name" class="text-lg font-medium border-b-4 border-green-700">Applicant Photo</label><br>
                                    @if($applicant->photo)
                                        <div>
                                            <img style="width:105px;" class="w-32 border" src="{{ $applicant->photo }}" alt="{{ $applicant->applicant_email }}">
                                        </div>
                                        <div class="items-center mt-3">
                                        <div>
                                            <input value="{{ $applicant->photo }}" type="file" name="photo">
                                        </div>
                                    </div>
                                    @endif
                                    @if(empty($applicant->photo))
                                    <div class="items-center mt-3">
                                        <div>
                                            <input value="{{ $applicant->photo }}" required type="file" name="photo">
                                        </div>
                                    </div>
                                    @endif
                                    @error('photo')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Programme  -->
                                <div class="my-4">
                                    <label for="programme" class="input-title">Programme</label><br>
                                    <div>
                                        <select required name="programme" class="input-field">
                                            <option value="{{ $applicant->programme }}">{{ $applicant->programme($applicant->programme) }}</option>
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

                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <a href="{{ route('application-registration-bio') }}" class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Back Step 1: Personal Data</a>
                                <button class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Next Step 3: 0' Level Result</button>
                            </div>
                        </form>
                    </div>   
                @endif
            </div>
        </div>
        <!-- System Password  -->
        @include('application.system_password')
    </div>
@endsection