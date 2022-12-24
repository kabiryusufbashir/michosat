@extends('layouts.template')

@section('page-title')
    Courses - MICOHSAT
@endsection

@section('body-content')
    <!-- Banner -->
    <div>
        @include('layouts.banner')
        <div class="absolute lg:top-54 top-64">
            <div class="bg-white font-extrabold p-8 ml-auto" id="slogan">        
                <p class="text-gray-700 font-semibold p-3">Available Courses</p>
            </div>
        </div>
    </div>
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center text-3xl font-semibold mt-4">Available Courses</div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Community Health Department</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Higher National Diploma Community Health (HNDCH) <br>
                        2. National Diploma Community Health (NDCH) 2years <br>
                        3. Professional Diploma Community Health (CHEW) 3 years <br>
                        4. Junior Community Health Extension Worker (JCHEW)
                    </p>
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Public Health Department</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. National Diploma Public Health (NDPH) 2 years <br>
                        2. Professional Diploma Public Health (DPH) 3years <br>
                        3. Diploma Epidemiology and Disease Control (DEDC)
                    </p>
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Health Education Department</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Diploma Health Promotion and Education <br>
                        2. Advance Diploma Health Promotion and Education
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
