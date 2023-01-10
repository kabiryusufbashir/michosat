@extends('layouts.template')

@section('page-title')
    Course Fee - MICOHSAT
@endsection

@section('body-content')
    <!-- Body Contents  -->
    <div class="pt-8 pb-5 text-left">
        <!-- About Us  -->
        <div class="text-center lg:text-3xl text-xl font-semibold mt-24">Course Fee</div>
        <div>
            <img class="w-24 mx-auto mt-8" src="{{ asset('images/courses.png') }}" alt="Courses">
        </div>
        <div class="lg:px-24 px-8 py-8 my-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingOne">
                    <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transitionfocus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        HIGHER NATIONAL DIPLOMA IN COMMUNITY HEALTH  (HNDCH)
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-10">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees </div>
                                                <div class="border p-2">Central registration </div>
                                                <div class="border p-2">Departmental registration </div>
                                                <div class="border p-2">Caution fees </div>
                                                <div class="border p-2">Medical fees </div>
                                                <div class="border p-2">Union fees </div>
                                                <div class="border p-2">Examination fees </div>
                                                <div class="border p-2">Internet support charges </div>
                                                <div class="border p-2">JAMB REGULARATION</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">70000</div>
                                                <div class="border p-2">7000</div>
                                                <div class="border p-2">7000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the JAMB</div>
                                                <div class="border p-2">97500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">70000</div>
                                                <div class="border p-2">7000</div>
                                                <div class="border p-2">7000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">95000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 7000 to the HOD every semester for handout, Stationaries are to be submitted to the library once.				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">7000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingTwo">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        NATIONAL DIPLOMA IN COMMUNITY HEALTH  (NDCH)
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-10">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">JAMB REGULARATION</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">60000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the JAMB</div>
                                                <div class="border p-2">83500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">60000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">81000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingFour">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        DIPLOMA IN COMMUNITY HEALTH EXTENSION WORKER (CHEW)
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Index fees</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">55000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the CHPRBN</div>
                                                <div class="border p-2">78500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">55000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">76000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingFive">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        CERTIFICATE IN COMMUNITY HEALTH EXTENSION WORKER (SCHEW)
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Index fees</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">46000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">2000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the CHPRBN</div>
                                                <div class="border p-2">68500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">46000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">4000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">66000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 4000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">4000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingSix">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        DIPLOMA IN PUBLIC HEALTH TECHNICIAN (DPHT)
                    </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Index fees</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">48000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the board</div>
                                                <div class="border p-2">71500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">48000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">67000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingSeven">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        NATIONAL DIPLOMA IN PUBLIC HEALTH  (NDPH)
                    </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">JAMB REGULARATION</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">50000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the JAMB</div>
                                                <div class="border p-2">73500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">50000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">69000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingEight">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        NATIONAL DIPLOMA IN EPIDEMIOLOGY AND DISEASE CONTROL  (NDEDC)
                    </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">JAMB REGULARATION</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">50000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the JAMB</div>
                                                <div class="border p-2">73500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">50000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">69000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingTen">
                    <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        DIPLOMA IN HEALTH PROMOTION AND EDUCATION (DHPE)
                    </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                        <div class="accordion-body py-4 px-5">
                            <p class="py-1 px-8">
                                <div class="text-gray-700 my-4 ml-2 lg:grid grid-cols-2 gap-3">
                                    <!-- First Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>First Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Caution fees</div>
                                                <div class="border p-2">Medical fees</div>
                                                <div class="border p-2">Union fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Index fees</div>
                                                <div class="border p-2">TOTAL</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">40000</div>
                                                <div class="border p-2">4000</div>
                                                <div class="border p-2">4000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1500</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">To be determined by the board</div>
                                                <div class="border p-2">61500</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Semester  -->
                                    <div>
                                        <div class="p-2 border"><b>Second Semester</b></div>
                                        <div class="lg:grid grid-cols-2">
                                            <div class="border">
                                                <div class="border p-2">Tution fees</div>
                                                <div class="border p-2">Central registration</div>
                                                <div class="border p-2">Departmental registration</div>
                                                <div class="border p-2">Practical supervison fees</div>
                                                <div class="border p-2">Examination fees</div>
                                                <div class="border p-2">Internet support charges</div>
                                                <div class="border p-2">Total</div>
                                            </div>
                                            <div class="border">
                                                <div class="border p-2">40000</div>
                                                <div class="border p-2">4000</div>
                                                <div class="border p-2">4000</div>
                                                <div class="border p-2">3000</div>
                                                <div class="border p-2">5000</div>
                                                <div class="border p-2">1000</div>
                                                <div class="border p-2">57000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    The 10,000 and 3000 are to be paid to the students affairs officer for uniform/Lab coat as well as ID card &Name tag once, 5000 to the HOD every semester for handout, Stationaries are to be submitted to the library once				
                                </div>
                                <div class="lg:grid grid-cols-2 my-6 lg:w-1/2 w-full">
                                    <div class="border">
                                        <div class="border p-2">Uniform</div>
                                        <div class="border p-2">Hand out fees</div>
                                        <div class="border p-2">ID card &Name tag fees</div>
                                        <div class="p-2">Stationaries; A4, Biro, Marker, BROOM, Detergent</div>
                                    </div>
                                    <div class="border">
                                        <div class="border p-2">10000</div>
                                        <div class="border p-2">5000</div>
                                        <div class="border p-2">3000</div>
                                        <div class="p-2"></div>
                                    </div>
                                </div>    
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
