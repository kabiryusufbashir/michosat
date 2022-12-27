@extends('layouts.template')

@section('page-title')
    Entry Requirement - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center lg:text-3xl text-xl font-semibold mt-8">Entry Requirement</div>
        <div>
            <img class="w-24 mx-auto mt-8" src="{{ asset('images/admission.png') }}" alt="Admission">
        </div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div>
                <div class="text-gray-700 my-4">
                    Admission into the school is done through entrance examination and interview. <br> 
                    All intending students must purchase the application form from the school or online when it is on sale and if successful go for the interview and be admitted.
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">GENERAL ENTRY REQUIREMENT</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Matured, highly discipline individuals who posses all the attributes of being healthy physically, mentally and morally sound <br>
                        2. There is no age limit provided the candidate satisfies basic entry requirement. <br>
                        3. Good citizen with readiness to learn, lack of criminal tendencies and ability to abide by the rules and regulation of the school. <br>
                        4. Intending candidates must at least posses Five (5) credit in English, Mathematics, Biology, Chemistry, Physics. <br>
                        5. HNDCH; in addition to 1 above possession of National Diploma Community Health (NDCH) is compulsory. <br>
                        6. PHNDCH; in addition to 1 above, possession of CHEW is compulsory. <br>
                        7. CHEW retraining; in addition to 1 above, possession of JCHEW certificate is compulsory. <br>
                        8. ADHPE; in addition to 1 above, possession of DHPE is compulsory. <br>
                        9. DHPE retraining; in addition to 1 above, possession of Certificate in Health Promotion and Education (CHPE) is compulsory. <br>
                        10. JCHEW ; 3 Credit and 2 passes are acceptable
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
