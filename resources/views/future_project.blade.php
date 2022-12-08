@extends('layouts.template')

@section('page-title')
    Future Project - Binaail Masaajid Foundation
@endsection

@section('body-content')
    <!-- Banner -->
    <div>
        <img id="banner-img" class="object-cover w-full sm:h-screen lg:h-auto" src="{{ asset('images/bg-3.jpg') }}" alt="BINAAIL MASAAJID WAL MADAARIS FOUDNDATION">
        <div class="absolute lg:top-48 top-52 right-0">
            <div class="text-white font-extrabold py-8 px-24 bg-green-700" id="slogan">        
                <p class="flex justify-center">FUTURE PROJECT</p>
            </div>
        </div>
    </div>
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-justify">
        <!-- Future Project  -->
        <div class="bg-white mt-8 pt-8 pb-16">
            <div class="text-center text-2xl font-medium py-6">Future Projects</div>
            <div class="pb-6">
                <img class="w-24 mx-auto" src="{{ asset('images/projects.png') }}" alt="Future Projects">
            </div>
            <div class="lg:px-24 px-8 mx-auto">
                <div class="lg:grid grid-cols-3 gap-6 py-2 text-left">
                    <div class="my-2">
                        1) Family Islamic center for each Local Government in Kano State 
                    </div>
                    <div class="my-2">
                        2) One Local government; one bore-hole
                    </div>
                    <div class="my-2">
                        3) Four Torrey homes to be built in Kano State 
                    </div>
                    <div class="my-2">
                        4) Four Orphanage homes to be built in Kano State  
                    </div>
                    <div class="my-2">
                        5) Ten village Masaajid to be built in Kano State   
                    </div>
                    <div class="my-2">
                        6) Marriage counselling program   
                    </div>
                    <div class="my-2">
                        7) Family Medical Assistance Program   
                    </div>
                    <div class="my-2">
                        8) Fasting (Ramadan) Feeding Program   
                    </div>
                    <div class="my-2">
                        9) Others that may come from time to time as situation demands   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
