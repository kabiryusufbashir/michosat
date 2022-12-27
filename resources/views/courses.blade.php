@extends('layouts.template')

@section('page-title')
    Courses - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center text-3xl font-semibold mt-8">Available Courses</div>
        <div>
            <img class="w-24 mx-auto mt-8" src="{{ asset('images/courses.png') }}" alt="Courses">
        </div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Department of Community Health Science</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Higher National Diploma in Community Health (HNDCH) 2 years <br>
                        2. Pre HND in Community Health (PHNDCH) 1 year <br>
                        3. National Diploma in Community Health (NDCH) 2 years <br>
                        4. Diploma in Community Health Extension Worker (CHEW) 3 years <br>
                        5. CHEW retraining 2 years
                        6. Junior Community Health Extension Worker (JCHEW) 2 years
                    </p>
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Department of Public Health Science</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. National Diploma Public Health (NDPH) 2 years <br>
                        2. Diploma in Public Health Technician (DPHT) 3 years <br>
                        3. Diploma in Epidemiology and Disease Control (DEDC) 2 years
                    </p>
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">Department of Health Education</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Advance Diploma in Health Promotion and Education (ADHPE) 1 year <br>
                        2. Diploma Health Promotion and Education (DHPE) 2 years <br>
                        3. Diploma Health Promotion and Education (DHPE) retraining 1 year
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
