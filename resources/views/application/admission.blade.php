<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admission Letter</title>
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
            <!-- Print Admission  -->
            <div class="flex justify-between px-6 items-center">
                <div class="col-span-2">
                    <div class="font-semibold text-xl text-center">{{ $school->name }}</div>
                    <div class="font-semibold text-xl text-center">{{ $applicant_bio->year }} Admission Letter</div>
                </div>
                <div class="col-span-1">
                    <img class="w-24" src="{{ $school->photo }}" alt="">
                </div>
            </div>
            <!-- Personal Information -->
            <div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                <div class="mb-8 text-2xl">
                    {{ Auth::guard('application')->user()->name }}
                </div>
                <div class="mb-8">
                    {{ $applicant_bio->address }}, <br>
                    {{ $applicant_bio->lga }}, <br>
                    {{ $applicant_bio->state }}, <br>
                    {{ $applicant_bio->country }} <br>
                </div>
                <div class="mb-8">
                    Dear <b>{{ Auth::guard('application')->user()->name }}</b>
                </div>
                <div>
                    <p>
                        We are pleased to inform you that you have been admitted to the study {{ $applicant_bio->programme($applicant_bio->programme) }} 
                        to the class of {{ $applicant_bio->year }} for the {{ $school->name }}. 
                        You will find a full admission package attached to this admission letter. 
                        It includes all the documents needed to follow up the registration which have to be submitted before the registration period closes. 
                        Congratulation. We are looking forward to seeing you.
                    </p>
                </div>
            </div>

            <div class="px-8 float-right mt-12">
                <div>.......................................................</div>
                <div>Mal Mansur Basiru Nuhu</div>
                <div>Ag. Registrar</div>
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