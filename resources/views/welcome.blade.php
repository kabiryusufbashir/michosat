@extends('layouts.template')

@section('page-title')
    Home - MICOHSAT
@endsection

@section('body-content')
    <!-- Banner -->
    <div>
        @include('layouts.banner')
        <div class="absolute lg:top-54 top-64">
            <div class="bg-white font-extrabold p-8 ml-auto" id="slogan">        
                <p class="text-gray-700 font-semibold p-3">2022/2023 admission is ongoing. 
                    <span class="bg-green-700 rounded p-6 text-white my-8 text-center">
                        Apply Now
                    </span>
                 </p>
            </div>
        </div>
    </div>
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-justify">
        <!-- About Us  -->
        <div id="about-us" class="lg:px-24 px-8 py-8 mt-8 lg:grid grid-cols-2 gap-10">
            <div>
                <div class="text-gray-700 my-8">
                    <h1 class="text-3xl font-semibold">Welcome to the MICOHSAT, your gateway to the best health professional courses</h1>
                </div>
                <div class="text-gray-700 my-8">
                    <p>
                        Our Mission To effectively train a qualitative health care providers with the use of higher groomed staff at both Academic and Professional level. To be Leading institution in the production of well trained and qualitative health care providers across the community.
                    </p>
                </div>
                <div class="bg-green-700 rounded p-3 w-1/4 text-white my-8 text-center">
                    Apply Now
                </div>
            </div>
            <div class="shadow-lg p-3">
                <a href="/courses">
                    <div class="flex m-10 items-center">
                        <div>
                            <img class="w-24" src="{{ asset('images/objective.png') }}" alt="Objective">
                        </div>
                        <div class="ml-8">
                            Available Courses
                        </div>
                    </div>
                </a>
                <div class="flex m-10 items-center">
                    <div>
                        <img class="w-24" src="{{ asset('images/objective.png') }}" alt="Objective">
                    </div>
                    <div class="ml-8">
                        Process Of Admission
                    </div>
                </div>
                <div class="flex m-10 items-center">
                    <div>
                        <img class="w-24" src="{{ asset('images/objective.png') }}" alt="Objective">
                    </div>
                    <div class="ml-8">
                        Academic Year
                    </div>
                </div>
            </div>
        </div>
        <!-- msgFromDirector  -->
        <div id="msgFromDirector" class="lg:px-24 px-8 mt-8 py-8">
            <div class="text-center text-3xl font-semibold py-6">Message From the Chairman Governing Council</div>
            <div class="pb-6">
                <img class="w-72 mx-auto rounded-full" src="{{ asset('images/1.jpg') }}" alt="Director Message">
            </div>
            <div class="text-center mb-8">
                Engr. Surajo Garba <br>  Chairman Governing Council
            </div>
            <div class="mx-auto pb-8">
                <p class="text-center lg:w-1/2 mx-auto">
                    Schools of Health play a vital role in ensuring sustainable societies and driving economic as well as social development of a nation. 
                    This is achieved through innovative teaching, research and knowledge transfer. Our aim at MICOHSAT is to be a leading institution in the production of well trained and qualitative health care providers across the community by provide a conducive learning environment, modern teaching aids and equipments, being driven by competent academic staff with proven track records in their area of expertise.
                </p>
            </div>
        </div>
        <!-- Staff  -->
        <div id="staffSection" class="lg:px-24 px-8 mt-4 py-8">
            <div class="text-center text-3xl font-semibold mb-4 py-6">Our Staff</div>
            <div id="staffSection" class="lg:grid grid-cols-3 gap-6">    
                <div>
                    <div class="pb-6">
                        <img class="w-52 mx-auto rounded-full" src="{{ asset('images/2.jpg') }}" alt="Provost">
                    </div>
                    <div class="text-center mb-8">
                        Ahmad Idris Falgore <br> Ag. Provost
                    </div>
                </div>
                <div>
                    <div class="pb-6">
                        <img class="w-52 mx-auto rounded-full" src="{{ asset('images/3.jpg') }}" alt="Ag. Registrar">
                    </div>
                    <div class="text-center mb-8">
                        Mansur Basiru Nuhu <br> Ag. Registrar
                    </div>
                </div>
                <div>
                    <div class="pb-6">
                        <img class="w-52 mx-auto rounded-full" src="{{ asset('images/4.jpg') }}" alt="Ag. Bursar">
                    </div>
                    <div class="text-center mb-8">
                        Rayyanu Ado Bari <br> Ag. Bursar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
