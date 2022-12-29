@extends('layouts.template')

@section('page-title')
    Contact us - MICOHSAT
@endsection

@section('body-content')
    <!-- Banner -->
    <div>
        @include('layouts.banner')
        <div class="absolute lg:top-72 top-24 hidden lg:block">
            <div class="bg-white font-extrabold p-8 ml-auto" id="slogan">        
                <p class="text-gray-700 font-semibold p-3">2022/2023 admission is ongoing. 
                    <a href="{{ route('apply') }}">
                        <span class="bg-green-700 rounded lg:p-6 p-2 text-white lg:my-8 my-2 text-center">
                            Apply Now
                        </span>
                    </a>
                 </p>
            </div>
        </div>
    </div>
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-justify">
        <!-- Future Project  -->
        <div class="bg-white mt-8 pt-8 pb-16">
            <div class="text-center text-2xl font-medium py-6">Contact Us</div>
            <div class="pb-6">
                <img class="w-24 mx-auto" src="{{ asset('images/contact.png') }}" alt="Contact Us">
            </div>
            <div class="lg:px-24 px-8 mx-auto">
                <div class="lg:grid grid-cols-4 gap-4 py-16 text-xs lg:text-sm">
                    <div class="col-span-1">
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-house"></i></span>
                            <span class="ml-3">No. 1 Engr. Surajo Garba Complex <br> beside Bari Science Academy <br> along Falgore road Bari Town of Rogo LG <br> Kano State</span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <span class="ml-3"><a href="tel:+2348076073192">+ 234 000 000 0000</a></span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <span class="ml-3"><a href="mailto:info@micohsat.com.ng">info@micohsat.com.ng</a></span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-globe"></i></span>
                            <span class="ml-3"><a href="https://micohsat.com.ng">www.micohsat.com.ng</a></span>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.025210656037!2d7.820605974969194!3d11.550049188649735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ad8b4136b2d8bb%3A0xc4dd384bbfb057fb!2sRogo%20Local%20Government!5e0!3m2!1sen!2sng!4v1672322764889!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
