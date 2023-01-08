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
                            <a id="indicatorNavTwo" href="#" class="active-nav-indicator">
                                <span>Step 5: Next of Kin /</span>
                            </a>
                            <a id="indicatorNavThree" href="#">
                                <span>Step 6: Sponsor</span>
                            </a>
                        </div>
                        <h1 class="py-2 font-semibold">Complete Your Registration {{ Auth::guard('application')->user()->name }}</h1>
                        <form action="{{ route('application-registration-kin-submit') }}" method="POST" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Next of KIN Information</h1>
                            @csrf
                            <!-- step 5 -->
                            <div id="stepTwo">
                                <!-- Name  -->
                                <div class="my-4">
                                    <label for="kin_name" class="input-title">Name</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_name : '' }}" type="text" name="kin_name" placeholder="Name" class="input-field">
                                    @error('kin_name')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Relationship  -->
                                <div class="my-4">
                                    <label for="kin_relation" class="input-title">Relationship</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_relation : '' }}" type="text" name="kin_relation" placeholder="Relationship" class="input-field">
                                    @error('kin_relation')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Phone  -->
                                <div class="my-4">
                                    <label for="kin_phone" class="input-title">Phone</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_phone : '' }}" type="text" name="kin_phone" placeholder="Phone" class="input-field">
                                    @error('kin_phone')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Address  -->
                                <div class="my-4">
                                    <label for="kin_address" class="input-title">Address</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_address : '' }}" type="text" name="kin_address" placeholder="Address" class="input-field">
                                    @error('kin_address')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- City  -->
                                <div class="my-4">
                                    <label for="kin_city" class="input-title">City</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_city : '' }}" type="text" name="kin_city" placeholder="City" class="input-field">
                                    @error('kin_city')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- LGA  -->
                                <div class="my-4">
                                    <label for="kin_lga" class="input-title">LGA</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_lga : '' }}" type="text" name="kin_lga" placeholder="LGA" class="input-field">
                                    @error('kin_lga')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- State  -->
                                <div class="my-4">
                                    <label for="kin_state" class="input-title">State</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_state : '' }}" type="text" name="kin_state" placeholder="State" class="input-field">
                                    @error('kin_state')
                                        {{$message}}
                                    @enderror
                                </div>
                                <!-- Country  -->
                                <div class="my-4">
                                    <label for="kin_country" class="input-title">Country</label><br>
                                    <input required value="{{ ($applicant != '') ? $applicant->kin_country : '' }}" type="text" name="kin_country" placeholder="Country" class="input-field">
                                    @error('kin_country')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <a href="{{ route('application-registration-qualification') }}" class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Back Step 4: Additional Qualifications</a>
                                <button class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Next Step 6: Sponsor</button>
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