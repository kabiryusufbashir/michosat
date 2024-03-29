<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!-- Tailwind Component  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

        <title>@yield('page-title')</title>
        @yield('page-meta')
        @vite('resources/css/app.css')
    </head>
    <body>
        <!-- Navigation  -->
        {{-- <div class="text-center text-2xl text-green-600">@include('layouts.messages')</div> --}}
        <div id="navDesktop" class="z-40 fixed bg-white w-full">
            <!-- Contact Info  -->
            <div class="flex justify-between text-gray-700 py-4 border-b lg:px-24 px-8 items-center">
                <div class="flex lg:text-2xl text-xs">
                    Mikiya International College of Health, Science and Technology (MICOHSAT)
                </div>
                <div class="flex">
                    <span class="ml-2">
                        <a class="flex items-center py-1" href="#">
                            <span><i class="fa-brands fa-facebook text-xl"></i></span>
                        </a>
                    </span>
                    <span class="ml-2">
                        <a class="flex items-center py-1" href="#">
                            <span><i class="fa-brands fa-twitter text-xl"></i></span>
                        </a>
                    </span>
                    <span class="ml-2">
                        <a class="flex items-center py-1" href="#">
                            <span><i class="fa-brands fa-linkedin text-xl"></i></span>
                        </a>
                    </span>
                    <span class="ml-2">
                        <a class="flex items-center py-1" href="#">
                            <span><i class="fa-brands fa-instagram text-xl"></i></span>
                        </a>
                    </span>
                </div>
            </div>
            <!-- NavBar  -->
            <div class="lg:grid grid-cols-5 gap-3 flex justify-between items-center py-4 lg:px-24 px-8 shadow">
        <!-- <div id="navDesktop" class="z-40 fixed bg-white w-full lg:grid grid-cols-5 gap-3 shadow lg:px-24 px-8 py-4 flex justify-between items-center"> -->
                <div class="flex justify-between w-full items-center lg:col-span-2">
                    <div id="menu" class="lg:hidden cursor-pointer lg:ml-auto">
                        <svg class="w-10 h-10 text-green-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </div>
                    <a href="/">
                        <div class="flex items-center">
                            <div>
                                <img class="w-16 lg:w-24 lg:ml-0" src="{{ asset('images/micohsat.png') }}" alt="MICOHSAT Logo">
                            </div>
                            <span class="ml-5 font-extrabold text-gray-700">
                                <!-- MIKIYA INTERNATIONAL <br> COLLEGE OF HEALTH SCIENCE AND TECHNOLOGY (MICOHSAT) <br> BARI -->
                                MICOHSAT <br> BARI
                            </span>
                        </div>
                    </a>
                </div>
                <div class="lg:col-span-3 hidden lg:block">
                    <nav class="lg:flex justify-between list-none uppercase font-medium items-center">
                        <li class="py-1 hover:text-green-600 text-gray-700 hover:border-b-2 hover:border-green-600"><a href="/">Home</a></li>
                        <li class="py-1 hover:text-green-600 text-gray-700 dropdown relative hover:border-b-2 hover:border-green-600">
                            <a class="flex" href="#" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                About MICOHSAT
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                </svg>
                            </a>
                            <ul class="dropdown-menu min-w-max absolute w-full bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton2">
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="/#about-us">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="/#msgFromDirector">
                                        Message From The Chairman 
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="/#staffSection">
                                        Our Staff
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="py-1 hover:text-green-600 text-gray-700 dropdown relative hover:border-b-2 hover:border-green-600">
                            <a class="flex" href="#" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                ACADEMICS
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                </svg>
                            </a>
                            <ul class="dropdown-menu min-w-max absolute w-full bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton2">
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="{{ route('courses') }}">
                                        AVAILABLE COURSES
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="{{ route('course-fee') }}">
                                        COURSE FEE
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="{{ route('calendar-front') }}">
                                        ACADEMIC CALENDAR
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="py-1 hover:text-green-600 text-gray-700 dropdown relative hover:border-b-2 hover:border-green-600">
                            <a class="flex" href="#" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                ADMISSION
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                </svg>
                            </a>
                            <ul class="dropdown-menu min-w-max absolute w-full bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton2">
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="{{ route('entry') }}">
                                        ENTRY REQUIREMENT
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="/process-of-admission">
                                        PROCESS OF ADMISSION
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="{{ route('apply') }}">
                                        APPLY NOW
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="py-1 hover:text-green-600 text-gray-700 hover:border-b-2 hover:border-green-600"><a href="/contact">Contact Us</a></li>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Mobile Nav -->
        <div id="navMobile" class="w-full fixed h-screen z-30 hidden bg-white py-8">
            <div class="list-none p-2 text-sm border-t bg-white pt-20">
                <li class="py-3 px-8">
                    <a href="/" class="flex justify-between items-center">
                        <span>Home</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-house text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('courses') }}" class="flex justify-between items-center">
                        <span>Availabe Courses</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-users text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('calendar-front') }}" class="flex justify-between border-b-1 items-center">
                        <span>Academic Calendar</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('entry') }}" class="flex justify-between border-b-1 items-center">
                        <span>Entry Requirement</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('process-of-admission') }}" class="flex justify-between border-b-1 items-center">
                        <span>Process of Admission</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('apply') }}" class="flex justify-between border-b-1 items-center">
                        <span>Apply Now</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="{{ route('course-fee') }}" class="flex justify-between border-b-1 items-center">
                        <span>Course Fee</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-briefcase text-2xl"></i></span>
                    </a>
                </li>
                <hr>
                <li class="py-3 px-8">
                    <a href="#" class="flex justify-between items-center">
                        <span>Contact Us</span>
                        &nbsp;&nbsp;
                        <span><i class="fa-solid fa-headset text-2xl"></i></span>
                    </a>
                </li>
            </div>
        </div>
        <!-- End of Navigation Bar  -->
        
        <!-- Body Content  -->
        <div class="relative top-20">
            @yield('body-content')
        </div>
        <!-- End of Body Content  -->

        <!-- Footer  -->
        <div class="relative top-12">
            <div id="footer" class="bg-gray-200 py-12 px-8 lg:px-24 lg:grid grid-cols-5 gap-8 text-gray-700">
                <div class="col-span-2">
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Address</h1>
                        <p class="py-1 text-left lg:w-2/3 w-full">
                            No. 1 Engr. Surajo Garba Complex beside Bari Science Academy along Falgore road Bari Town of Rogo LG <br> Kano State
                        </p>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-3xl font-bold mb-4">Vision</h1>
                        <p class="py-1 lg:w-2/3 w-full">
                            Leading institution in the production of well trained and qualitative health care providers across the country
                        </p>
                    </div>
                </div>
                <div class="col-span-1">
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Navigation</h1>
                        <nav class="list-none text-gray-700">
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="/">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="/#about-us">
                                    <span>About Us</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="/#staffSection">
                                    <span>Our Staff</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </div>
                <div class="col-span-1">
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Academics</h1>
                        <nav class="list-none text-gray-700">
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('courses') }}">
                                    <span>Available Courses</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('calendar-front') }}">
                                    <span>Academic Calendar</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('entry') }}">
                                    <span>Entry Requirement</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('process-of-admission') }}">
                                    <span>Process of Admission</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('course-fee') }}">
                                    <span>Course Fee</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="{{ route('apply') }}">
                                    <span>Apply Now</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </div>
                <div class="col-span-1">    
                    <div>
                        <h1 class="text-3xl font-bold mb-4">Follow Us</h1>
                        <nav class="list-none text-gray-700">
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://twitter.com/bornowomendevt">
                                    <span><i class="fa-brands fa-twitter text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Twitter</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://web.facebook.com/bornowomen/">
                                    <span><i class="fa-brands fa-facebook text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Facebook</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="https://www.linkedin.com/company/bowdi/">
                                    <span><i class="fa-brands fa-linkedin text-xl"></i></span> &nbsp;&nbsp;
                                    <span>LinkedIn</span>
                                </a>
                            </li>
                            <li class="py-1 hover:text-gray-800">
                                <a class="flex items-center py-1" href="#">
                                    <span><i class="fa-brands fa-instagram text-xl"></i></span> &nbsp;&nbsp;
                                    <span>Instagram</span>
                                </a>
                            </li>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="py-7 text-center text-xs bg-green-700 text-white">
                <footer>
                    Designed & Developed by <a class="hover:text-green-600 " href="#">BITCAGS LTD</a><br>
                    Copyright © @php echo date('Y') @endphp MICOHSAT. All Rights Reserved 
                </footer>
            </div>
        </div>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                extend: {
                    fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    },
                }
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
        <script src="{{ asset('js/front.js') }}"></script>
    </body>
</html>
