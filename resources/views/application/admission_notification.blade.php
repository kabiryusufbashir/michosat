<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admission Notification Letter</title>
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
                margin: 2% 0px;
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
            <!-- Letter Head  -->
            <div class="px-6 text-center">
                
                <div>
                    <img style="width:80px;" class="w-28 mx-auto" src="{{ $school->photo }}" alt="">
                </div>
                <div>
                    <div>
                        MIKIYA INTERNATIONAL COLLEGE OF HEALTH SCIENCE AND TECHNOLOGY (MICOHSAT) BARI
                    </div>
                </div>
                <div>
                    <div>
                        ADDRESS: NO 1 ENG. SURAJO GARBA COMPLEX ALONG FALGORE ROAD BARI TOWN ROGO LG KANO STATE
                    </div>
                </div>
                <div>
                    WEBSITE: www.micohsat.com.ng | EMAIL: MICOHSAT2022@GMAIL.COM
                </div>
                <div>
                    Tel: 08026948116, 08031320836
                </div>
                <div>
                    Motto: Humanity Service
                </div>
            </div>
            <div class="px-6 mt-5 ml-4 mb-12">
                <div class="text-sm mb-2">Provost: Ahmad Idris Falgore RCHP, PMP, ACIPM, RHEP (NDCH, SCHEW, CHO, BSC, MCH, MSCPH, DFM, PGDPM, LMIH, IEGD)</div>
                <div class="text-sm">Registrar: Mansir Basiru Nuhu RHEP, (CHEW, HDHEP, BSC )</div>
            </div>
            
            <!--<div class="px-6 text-sm float-right mb-4">Date: 30th January 2023</div>-->
            <div class="px-6 text-sm ml-4 my-2">
                <div class="mb-2">
                    To: <b>{{ Auth::guard('application')->user()->name }}</b>
                </div>
                <div class="mb-2">
                    Application No: <b>{{ Auth::guard('application')->user()->application_no }}</b>
                </div>
                <div>
                    Course: <b>{{ $applicant_bio->programme($applicant_bio->programme_admitted) }}</b>
                </div>
            </div>
            <div class="px-6 ml-4 text-center font-semibold text-xl mt-12">
                NOTIFICATION OF ADMISSION (2022/2023 SESSION)
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2">
                <p>
                    I am pleased to inform you that you have offered a provisional admission into this college as specified in the student's and course details below:-
                </p>
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <b>STUDENT DETAILS</b> <br> 						
                        1.	Entry Qualification: O-Level <br> 			
                        2.	Entry Level: 100 Level 				
                    </div>
                    <div>
                        <b>COURSE DETAILS</b> <br>
                        1. Academic Session: 2022/2023 <br>
                        2. Study Format: Full-Time
                    </div>
                </div>
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2">
                <p>
                    However, you are expected to formally accept this offer within two weeks by paying an ACCEPTANCE FEES OF <b>N5000.00</b> via Zenith bank 1226583359 MIKIYA INT COL  OF HEALTH SCI & TECH. and collecting the admission letter. Please note that all fees paid are neither refundable nor transferable.
                </p>
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2 mt-12">
                <p class="mb-12">
                    Please accept my hearty congratulations,
                </p>
                <p>
                    Mansir Basiru Nuhu RCHP, RHE <br>
                    Registrar for provost
                </p>
            </div>
        </div>
        <div class="w-full fixed text-center bottom-0 text-sm">
            A Product Bitcags IT
        </div>
        <script type="text/javascript">
            window.print()
            /* setTimeout(function () {
                window.close();
                window.location = '../../../application/dashboard';
           }, 500); */
        </script>
    </body>
</html>