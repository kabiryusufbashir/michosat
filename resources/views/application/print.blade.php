<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Print Slip</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/production.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @vite('resources/css/app.css')
        <style type="text/css">
            @page { size: auto;  margin: 0mm; }
            @page {
            size: A4;
            margin: 0;
            }
            
            @media print {
            html, body {
                width: 210mm;
                height: 287mm;
                font-size: 10px;
            }

            html {

            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
                background: transparent;  /* optional: just make scrollbar invisible */
            }
        </style>
    </head>
    <body>
        <div class="mt-2">
            <!-- Print Course  -->
            <div class="flex justify-between px-6 items-center">
                <div class="col-span-1">
                    <img style="width:80px; height:80px;" class="w-24" src="{{ $school->photo }}" alt="">
                </div>
                <div class="col-span-2">
                    <div class="font-semibold text-xl text-center">{{ $school->name }}</div>
                    <div class="font-semibold text-xl text-center">{{ $applicant_bio->year }} Application Form</div>
                </div>
                <div class="col-span-1">
                    <img style="width:80px; height:80px;" class="w-24" src="{{ $applicant_bio->photo }}" alt="">
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
                        {{ Auth::guard('application')->user()->name }}
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
                    @if(count($applicant_result_a_level) > 0)
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
                                                            SUBJECT
                                                        </th>
                                                        <th class="px-6 py-2  text-gray-500 border">
                                                            GRADE
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($applicant_result_a_level as $course)
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
                
            </div>
            <div class="px-8 mb-5">
                I ............................................. agree that whatever Information I given is correct to the best of my understanding and I will be held accountable for any wrong Information given.</span>
            </div>
            <div class="px-8 float-right mt-5">
                <div>.......................................................</div>
                <div>{{ Auth::guard('application')->user()->name }}</div>
            </div>
        </div>
        <div class="w-full fixed text-center bottom-0 text-sm">
            A Product Bitcags IT
        </div>
        <script type="text/javascript">
            window.print()
            setTimeout(function () {
                window.close();
                window.location = '../../../application/dashboard';
           }, 500);
        </script>
    </body>
</html>