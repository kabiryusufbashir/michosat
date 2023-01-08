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
                        <form action="{{ route('application-registration-bio-submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1  -->
                            <div id="stepOne">
                                <!-- Gender  -->
                                <div class="my-4">
                                    <label for="gender" class="input-title">Gender</label><br>
                                    <select required name="gender" class="input-field">
                                        <option value="{{ ($applicant != '') ? $applicant->gender : '' }}">{{ ($applicant != '') ? $applicant->gender : '' }}</option>
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
                                    <input required value="{{ ($applicant != '') ? $applicant->dob : '' }}" type="date" name="dob" placeholder="Date of Birth" class="input-field">
                                    @error('dob')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Marital Status  -->
                                <div class="my-4">
                                    <label for="marital_status" class="input-title">Marital Status</label><br>
                                    <select required name="marital_status" class="input-field">
                                        <option value="{{ ($applicant != '') ? $applicant->marital_status : '' }}">{{ ($applicant != '') ? $applicant->marital_status : '' }}</option>
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
                                    <input required value="{{ ($applicant != '') ? $applicant->phone : '' }}" type="text" name="phone" placeholder="Phone" class="input-field">
                                    @error('phone')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Address  -->
                                <div class="my-4">
                                    <label for="address" class="input-title">Address</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->address : '' }}" type="text" name="address" placeholder="Address" class="input-field">
                                    @error('address')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- City  -->
                                <div class="my-4">
                                    <label for="city" class="input-title">City</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->city : '' }}" type="text" name="city" placeholder="City" class="input-field">
                                    @error('city')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- LGA  -->
                                <div class="my-4">
                                    <label for="lga" class="input-title">LGA</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->lga : '' }}" type="text" name="lga" placeholder="LGA" class="input-field">
                                    @error('lga')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- State  -->
                                <div class="my-4">
                                    <label for="state" class="input-title">State</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->state : '' }}" type="text" name="state" placeholder="State" class="input-field">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Country  -->
                                <div class="my-4">
                                    <label for="country" class="input-title">Country</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->country : '' }}" type="text" name="country" placeholder="Country" class="input-field">
                                    @error('country')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <button disabled class="bg-gray-400 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Step 1: Personal Data</button>
                                <button class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Next Step 2: Programme & Photo</button>
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