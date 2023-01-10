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
            
            <div class="px-6 text-sm float-right mb-4">Date: 30th January 2023</div>
            <div class="px-6 text-sm ml-4 my-2">
                <div class="mb-2">
                    Name: <b>{{ Auth::guard('application')->user()->name }}</b>
                </div>
                <div>
                    Application No: <b>{{ Auth::guard('application')->user()->application_no }}</b>
                </div>
            </div>
            <div class="px-6 text-sm ml-4 text-center font-semibold text-xl mt-12">
                PROVISIONAL OFFER OF ADMISSION (2022/2023 SESSION)
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2">
                <p>
                    I am pleased to inform you that you have been offered a provisional admission in to this college to pursue a programme leading to the award of <b>{{ $applicant_bio->programme($applicant_bio->programme) }}</b>.
                </p>
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2">
                <p>
                    The offer is made to the following conditions;
                </p>
            </div>
            <div class="px-6 text-sm ml-8 my-2 py-2">
                <p>
                    1.	That you possess the minimum qualification for the programme, <br>
                    2.	That you are found physically and mentally fit, <br>
                    3.	That you are to produce at the time of registration the original and three photocopies of all your credentials including the certificates of all school attended, medical fitness, birth/declaration of age, signed application slip, three passport size photograph and the filled acceptant form,  <br>
                    4.	That  you pay your registration fees (tuition fees and other charges) when due (fees are not refundable after payment), <br>
                    5.	That you renew your registration at the beginning of every semester or session as applicable. Failure to do that would amount to voluntary withdrawal, <br>
                    6.	That the college reserves the right to withdraw your admission whenever it discover that you have been given the false information, you score below minimum or you shows an unacceptable behavior. <br>
                    7.	That the graduation from the chosen program is predicated on the meeting of all the college academic board requirement.<br>
                </p>
            </div>
            <div class="px-6 text-sm ml-4 my-2 py-2 mt-12">
                <p>
                    Congratulations,
                </p>
                <p>
                    <img class="width:30px;" src="{{ asset('images/signature.png') }}" alt="signature">
                </p>
                <p>
                    Mansir Bashir Nuhu RCHP, RHEP <br>
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