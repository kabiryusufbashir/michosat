@extends('layouts.template')

@section('page-title')
    Process of Admission - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center lg:text-3xl text-xl font-semibold mt-24">Process of Admission</div>
        <div>
            <img class="w-24 mx-auto mt-8" src="{{ asset('images/admission.png') }}" alt="Admission">
        </div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div>
                <div class="text-gray-700 my-4">
                    Admission into the school is done through entrance examination and interview. <br> 
                    All intending students must purchase the application form from the school when it is on sale and if successful go for the interview and be admitted.
                </div>
            </div>
            <div>
                <div class="text-gray-700 my-4">
                    <h1 class="text-xl font-semibold">ONLINE APPLICATION INSTRUCTIONS</h1>
                </div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        1. Create an account to begin the application process. <br>
                        2. Purchase a Scratch card at sum of four thousand naira (N4,000) only at: <br> <div class="ml-4">- College premises, <br> - Access bank Kafur Malumfashi, <br> - Zenith Bank Gwarzo Kabuga, <br> - Keystone Bank Makarfi <br> - or an accredited agent. </div>
                        3. Upload your receipt payment on your portal and complete the application process. <br>
                        4. Download your acknowledge slip on your portal <br>
                        5. For enquiries/complaints, Send a mail to the support email <a href="mailto:info@micohsat.com">info@micohsat.com</a><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
