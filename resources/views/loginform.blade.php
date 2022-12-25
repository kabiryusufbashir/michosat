@extends('layouts.template')

@section('page-title')
    Portal - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- Apply Form  -->
        <div class="lg:px-24 px-8 py-8 my-8 lg:grid grid-cols-2 gap-10 items-center">
            <div>
                <div class="text-gray-700 my-8">
                    <h1 class="text-3xl font-semibold"> Start your application 2022/2023 Application NOW!!!</h1>
                </div>
                <div>
                    <img class="w-40 mx-auto mt-8" src="{{ asset('images/apply.png') }}" alt="Apply">
                </div>
            </div>
            <div class="shadow-lg p-3">
                <!-- Application  -->
                <div class="login-div">
                    <div class="text-center text-white">@include('includes.messages')</div>
                    <div id="loginBtnSection">
                        <h1 class="text-white text-xl text-center">Choose how you want to <br> Login </h1>
                        <!-- Button  -->
                        <div class="mt-10">
                            <div id="staffLoginBtn" class="bg-green-800 rounded py-3 mb-3 mx-auto text-center text-white cursor-pointer">Staff Login</div>
                            <div id="studentLoginBtn" class="bg-green-800 rounded py-3 mb-3 mx-auto text-center text-white cursor-pointer">Student Login</div>
                        </div>
                    </div>

                    <!-- Staff Login Section  -->
                    <div id="staffLoginSection" class="login-div hidden">
                        <h1 class="text-xl text-center font-medium">Staff Login</h1>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="staff_id" class="font-medium">Staff ID</label><br>
                                <input class="input-field" type="text" name="user_id" id="staff_id" placeholder="Enter Staff ID">
                            </div>
                            <div class="my-3">
                                <label for="password" class="font-medium">Password</label><br>
                                <input class="input-field" type="password" name="password" id="password" placeholder="Enter Password">
                            </div>
                            <div class="text-right text-green-600">
                                <span>Forgot Password</span>
                            </div>
                            <div class="my-3">
                                <input type="submit" value="Login" class="bg-green-600 w-full py-3 text-white text-sm rounded cursor-pointer">
                            </div>
                        </form>
                    </div>

                    <!-- Student Login Section  -->
                    <div id="studentLoginSection" class="login-div hidden">
                        <h1 class="text-xl text-center font-medium">Student Login</h1>
                        <form action="{{ route('login-student') }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <label for="student_id" class="font-medium">Student ID</label><br>
                                <input class="input-field" type="text" name="user_id" id="student_id" placeholder="Enter Student ID">
                            </div>
                            <div class="my-3">
                                <label for="password" class="font-medium">Password</label><br>
                                <input class="input-field" type="password" name="password" id="password" placeholder="Enter Password">
                            </div>
                            <div class="text-right text-green-600">
                                <span>Forgot Password</span>
                            </div>
                            <div class="my-3">
                                <input type="submit" value="Login" class="bg-green-600 w-full py-3 text-white text-sm rounded cursor-pointer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
