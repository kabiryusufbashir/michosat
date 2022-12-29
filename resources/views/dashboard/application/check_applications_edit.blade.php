@extends('layouts.app')

@section('page-title')
    APPLICATION
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.root_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <!-- User Info  -->
            @include('includes.root_user_info')
            <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
            <!-- Edit check_application  -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
                <h1 class="text-lg font-semibold py-4 w-full">{{ $applicant_fullname }} Application Form</h1>
                <div class="p-4">
                    <!-- Print Course  -->
                    <div class="px-6 items-center">
                        <div>
                            <img style="width:100px; height:100px;" class="w-24 mx-auto" src="{{ $applicant_bio->photo }}" alt="">
                        </div>
                    </div>
                    <!-- Personal Information -->
                    <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                        <div class="w-full">
                            <div class="border px-4">
                                <div class="text-xl py-2 text-gray-500">Personal Information</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                NAME
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_fullname }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                PROGRAMME
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->programme($applicant_bio->programme) }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                EMAIL
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->applicant_email }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                Marital Status
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->marital_status }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                GENDER
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->gender }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                Date of Birth
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->dob }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                CITY
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->city }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                ADDRESS
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->address }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                LGA
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->lga }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                STATE
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->state }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                COUNTRY
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->country }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                PHONE
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->phone }}
                            </div>
                        </div>
                    </div>
                    <!-- Next OF Kin -->
                    <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                        <div class="w-full">
                            <div class="border px-4">
                                <div class="text-xl py-2 text-gray-500">Next of Kin Information</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2 text-gray-500 font-semibold">
                                NAME
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_name }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                CITY
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_city }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                ADDRESS
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_address }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                LGA
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_lga }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                STATE
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_state }}
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-4 border">
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                COUNTRY
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_country }}
                            </div>
                            <div class="px-6 py-2  text-gray-500 font-semibold">
                                PHONE
                            </div>
                            <div class="px-6 py-2  text-gray-500">
                                {{ $applicant_bio->kin_phone }}
                            </div>
                        </div>
                    </div>
                    <!-- Result -->
                    <div class="grid grid-cols-2 gap-4 bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                        <!-- O Level  -->
                        <div>
                            @if(count($applicant_result) > 0)
                                <div class="my-3">
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="w-full"">
                                                        <thead class="border">
                                                            <tr class="text-left whitespace-nowrap border-b">
                                                                <th class="px-6 py-2  text-gray-500">
                                                                    0' Level Result
                                                                </th>
                                                            </tr>
                                                            <tr class="text-left whitespace-nowrap">
                                                                <th class="px-6 py-2  text-gray-500 border">
                                                                    SUBJECT
                                                                </th>
                                                                <th class="px-6 py-2  text-gray-500 border">
                                                                    GRADE
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($applicant_result as $course)
                                                                <tr class="divide-y divide-gray-300 border-b-2">
                                                                    <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                        {{ $course->subject }}
                                                                    </td>
                                                                    <td class="px-6 py-4 text-sm text-gray-500 border">
                                                                        {{ $course->grade }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach     
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- A ' Level  -->
                        <div>
                            @if($applicant_bio->applicant_a_level_result)
                                <div class="my-3">
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="w-full"">
                                                        <thead class="border">
                                                            <tr class="text-left whitespace-nowrap border-b">
                                                                <th class="px-6 py-2  text-gray-500">
                                                                    A' Level Result
                                                                </th>
                                                            </tr>
                                                            <tr class="text-left whitespace-nowrap">
                                                                <th class="px-6 py-2  text-gray-500 border">
                                                                    <img class="w-72 mx-auto hover:w-full" src="{{ $applicant_bio->applicant_a_level_result }}" alt="">
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    <!-- check_application Edit  -->
                    <form action="{{ route('check-application-update', $applicant_bio->applicant_email) }}" method="POST" class="px-6 lg:px-8 py-8">
                        @csrf
                        @method('PATCH') 
                        <div class="text-center my-4">
                            <button class="submit-btn">ADMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection