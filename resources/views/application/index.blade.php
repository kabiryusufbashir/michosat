@extends('layouts.app')

@section('page-title')
    Application - MICOHSAT
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.application_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="col-span-5 mt-2">
            <div class="ml-4 mr-8 mb-4">    
                <!-- Stat  -->
                <div class="grid grid-cols-3 gap-3 ml-4 mr-8 mb-4">
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Application:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                            <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    {{ Auth::guard('application')->user()->checkPaymentStatus() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Registration:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                                <div class="font-medium mb-1 text-sm">Registration Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    Not Completed 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
                        <div>
                            <div class="font-medium mb-1 text-lg">Admission:</div>
                            <div class="font-semibold mb-1 text-2xl flex items-center">
                                <div class="font-medium mb-1 text-sm">Admission Status: &nbsp;</div>
                                <div class="font-medium mb-1 text-sm">
                                    Not Yet 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upload Receipt -->
                @if(Auth::guard('application')->user()->checkPayment() == 0)
                    <div class="bg-white lg:py-24 px-6 text-gray-600 mb-5 rounded col-span-2">
                        <form action="{{ route('application-payment-receipt') }}" method="POST" class="w-2/3" enctype="multipart/form-data">
                            <h1 class="py-2 font-semibold">Upload your Application payment receipt {{ Auth::guard('application')->user()->name }}</h1>
                            @csrf
                                <div class="flex my-5">
                                    <label for="semester" class="text-lg font-medium border-b-4 border-green-700 ml-4">Application Payment Receipt</label><br>
                                    <input class="input-field" type="file" name="receipt">
                                    @error('receipt')
                                        {{$message}}
                                    @enderror
                                </div>     
                                <div class="text-center my-4">
                                    <button class="submit-btn">SUBMIT</button>
                                </div>
                        </form>
                    </div>
                @endif        
            </div>
        </div>
    </div>
@endsection