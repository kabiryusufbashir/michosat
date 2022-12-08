@extends('layouts.template')

@section('page-title')
    Contact us - Binaail Masaajid Foundation
@endsection

@section('body-content')
    <!-- Banner -->
    <div>
        <img id="banner-img" class="object-cover w-full sm:h-screen lg:h-auto" src="{{ asset('images/bg-1.jpg') }}" alt="BINAAIL MASAAJID WAL MADAARIS FOUDNDATION">
        <div class="absolute lg:top-48 top-52 right-0">
            <div class="text-white font-extrabold py-8 px-24 bg-green-700" id="slogan">        
                <p class="flex justify-center">CONTACT US</p>
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
                            <span class="ml-3">No. 7, Suite 9 Maiduguri Road, <br> Kano State Nigeria</span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <span class="ml-3"><a href="tel:+2348076073192">+ 234 805 492 6771</a></span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <span class="ml-3"><a href="tel:+2349044580579">+ 234 706 326 6839</a></span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <span class="ml-3"><a href="mailto:info@binaailmasaajidfoundation.org">info@binaailmasaajidfoundation.org</a></span>
                        </div>
                        <div class="mb-3 flex">
                            <span><i class="fa-solid fa-globe"></i></span>
                            <span class="ml-3"><a href="https://binaailmasaajidfoundation.org">www.binaailmasaajidfoundation.org</a></span>
                        </div>
                    </div>
                    <div class="col-span-3">
                        <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.00577658201!2d8.56711001476027!3d11.974101591515751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ae818863bee5e1%3A0x1cc977729cc08919!2s7%2C%209%20Maiduguri%20Road%2C%20Unguwa%20Uku%20700102%2C%20Kano!5e0!3m2!1sen!2sng!4v1669826563871!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
