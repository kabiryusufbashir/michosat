@extends('layouts.template')

@section('page-title')
    Login - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- Apply Form  -->
        <div class="lg:px-24 px-8 py-8 my-8 lg:grid grid-cols-2 gap-10 items-center">
            <div>
                <div class="text-gray-700 my-8">
                    <h1 class="text-3xl font-semibold">Login to Complete your <br>Application NOW!!!</h1>
                </div>
                <div>
                    <img class="lg:w-40 w-24 mx-auto mt-8" src="{{ asset('images/apply.png') }}" alt="Apply">
                </div>
            </div>
            <div class="shadow-lg p-3">
                <!-- Application  -->
                <div class="login-div">
                    <h1 class="text-xl text-center font-medium">Login</h1>
                    <div class="text-xl text-left">@include('layouts.messages')</div>
                    <form action="{{ route('applynowlogin') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="staff_id" class="font-medium">Email Address</label><br>
                            <input required class="input-field" type="email" name="email" id="email" placeholder="Email Address">
                        </div>
                        <div class="my-3">
                            <label for="password" class="font-medium">Password</label><br>
                            <input class="input-field" type="password" name="old_password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="my-3">
                            <input type="submit" value="LOGIN" class="bg-green-600 w-full py-3 text-white text-sm rounded cursor-pointer">
                        </div>
                    </form>
                    <a href="{{ route('apply') }}">
                        <div class="text-center">Don't have an Account? Create an Account Now!</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
