@extends('layouts.template')

@section('page-title')
    Calendar - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center lg:text-3xl text-xl font-semibold mt-8">Calendar</div>
        <div>
            <img class="w-24 mx-auto mt-8" src="{{ asset('images/admission.png') }}" alt="Admission">
        </div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div>
                <div class="text-gray-700 my-4 ml-2">
                    <p>
                        @if(count($calendars) > 0)
                            @foreach($calendars as $calendar)
                                <div class="lg:grid lg:grid-cols-5 gap-3 border-t items-center py-3 hover:bg-green-600 hover:text-white px-4">
                                    <div class="col-span-1">
                                        <div>{{ $calendar->dateFormat($calendar->start_date) }}</div>
                                        <div class="text-center">to</div>
                                        <div>{{ $calendar->dateFormat($calendar->end_date) }}</div>
                                    </div>
                                    <div class="col-span-4">
                                        <div class="font-semibold">{{ $calendar->activity }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h1 class="text-lg font-semibold py-4 w-full">No Calendar Found</h1>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
