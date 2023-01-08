@extends('layouts.app')

@section('page-title')
    Application - MICOHSAT
@endsection

@section('contents')
    <div class="grid grid-cols-6">
        <!-- Navigation  -->
        <div class="bg-white lg:col-span-1 col-span-1">
            @include('includes.root_system_info')
            <!-- Menu Bar  -->
            @include('includes.application_menu_bar')
        </div>
        <!-- Statistics Content -->
        <div class="lg:col-span-5 col-span-5 mt-2">
            <div class="ml-4 mr-8 mb-4">    
                <div class="text-center text-xl text-gray-600 mt-2 ml-4 mr-7 rounded py-3">@include('includes.messages')</div>
                <!-- Stat  -->
                @include('includes.stats')
                <!-- Upload Document  -->
                @if(Auth::guard('application')->user()->checkApplicationProgress() == 1)
                    <div class="bg-white lg:py-6 py-3 px-6 text-gray-600 mb-5 lg:ml-4 lg:mr-8 rounded">
                        <div class="mb-4 lg:flex grid lg:text-sm text-xs mt-5">
                            <a id="indicatorNavOne" href="#">
                                <span>Step 1: Personal Data /</span>
                            </a>
                            <a id="indicatorNavFour"  href="#">
                                <span>Step 2: Programme and Photo  /</span>
                            </a>
                            <a id="indicatorNavFive"  href="#" class="active-nav-indicator">
                                <span>Step 3: 0' Level Result  /</span>
                            </a>
                            <a id="indicatorNavSix"  href="#">
                                <span>Step 4: Additional Qualifications  /</span>
                            </a>
                            <a id="indicatorNavTwo" href="#">
                                <span>Step 5: Next of Kin /</span>
                            </a>
                            <a id="indicatorNavThree" href="#">
                                <span>Step 6: Sponsor</span>
                            </a>
                        </div>
                        <h1 class="py-2 font-semibold">Complete Your Registration {{ Auth::guard('application')->user()->name }}</h1>
                        <form action="{{ route('application-registration-result-submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 3 -->
                            <div id="stepFive">
                                <div class="lg:grid grid-cols-2 gap-4">
                                    <!-- Subject one  -->
                                    <div>
                                        <h1 class="py-2 font-semibold">First Sitting</h1>
                                        <div class="border-b-2 my-2">
                                            <label for="one_exam_type" class="input-title">Exam Type</label><br>
                                            <div class="">
                                                <select type="text" name="one_exam_type" class="input-field mb-2">
                                                    <option value="{{ ($applicant_result_first_type != '') ? $applicant_result_first_type : '' }}">{{ ($applicant_result_first_type != '') ? $applicant_result_first_type : '' }}</option>
                                                    <option value="NECO">NECO</option>
                                                    <option value="WAEC">WAEC</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('one_exam_type')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="one_exam_no" class="input-title">Exam No</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_first_no != '') ? $applicant_result_first_no : '' }}" type="text" name="one_exam_no" class="input-field mb-2">
                                                @error('one_exam_no')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="one_exam_year" class="input-title">Exam Year</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_first_year != '') ? $applicant_result_first_year : '' }}" type="text" name="one_exam_year" class="input-field mb-2">
                                                @error('one_exam_year')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="one_exam_center" class="input-title">Exam Center</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_first_center != '') ? $applicant_result_first_center : '' }}" type="text" name="one_exam_center" class="input-field mb-2">
                                                @error('one_exam_center')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <!-- Subject  -->
                                            <label for="one_subject" class="input-title">Subject</label><br>
                                            @if(count($applicant_result_first) > 0)
                                                @foreach($applicant_result_first as $first)
                                                    <div class="lg:flex grid">
                                                        <div class="w-full mr-2">
                                                            <select type="text" name="one_subject_name[]" class="input-field mb-2 mr-10">
                                                                <option value="{{ $first->subject }}">{{ $first->subject }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="w-full">
                                                            <select type="text" name="one_subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                                                <option value="{{ $first->grade }}">{{ $first->grade }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                            <div class="lg:flex grid">
                                                <div class="w-full mr-2">
                                                    <select type="text" name="one_subject_name[]" class="input-field mb-2 mr-10">
                                                        <option value=""></option>
                                                        <option value="COMMERCE">COMMERCE</option>
                                                        <option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>
                                                        <option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>
                                                        <option value="ECONOMICS">ECONOMICS</option>
                                                        <option value="GEOGRAPHY">GEOGRAPHY</option>
                                                        <option value="GOVERNMENT">GOVERNMENT</option>
                                                        <option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>
                                                        <option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>
                                                        <option value="CIVIC EDUCATION">CIVIC EDUCATION</option>
                                                        <option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>
                                                        <option value="HAUSA">HAUSA</option>
                                                        <option value="IGBO">IGBO</option>
                                                        <option value="YORUBA">YORUBA</option>
                                                        <option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>
                                                        <option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>
                                                        <option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>
                                                        <option value="BIOLOGY">BIOLOGY</option>
                                                        <option value="CHEMISTRY">CHEMISTRY</option>
                                                        <option value="PHYSICS">PHYSICS</option>
                                                    </select>
                                                </div>
                                                <div class="w-full">
                                                    <select type="text" name="one_subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                                        <option value=""></option>
                                                        <option value="A1">A1</option>
                                                        <option value="B2">B2</option>
                                                        <option value="B3">B3</option>
                                                        <option value="C4">C4</option>
                                                        <option value="C5">C5</option>
                                                        <option value="C6">C6</option>
                                                        <option value="D7">D7</option>
                                                        <option value="E8">E8</option>
                                                        <option value="F9">F9</option>
                                                    </select>
                                                </div>
                                                @error('one_subject')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                        <div id="one_subjectSection" class="my-4"></div>
                                        <div id="one_addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Subject + </div>
                                        <br><br>
                                        <div id="one_subjectSectionOption" class="my-4"></div>
                                        <div id="one_addFieldOption" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Option + </div>
                                        <br><br>
                                    </div>
                                    <!-- Subject Two  -->
                                    <div>
                                        <h1 class="py-2 font-semibold">Second Sitting</h1>
                                        <div class="border-b-2 my-2">
                                            <label for="two_exam_type" class="input-title">Exam Type</label><br>
                                            <div class="">
                                                <select type="text" name="two_exam_type" class="input-field mb-2">
                                                    <option value="{{ ($applicant_result_second_type != '') ? $applicant_result_second_type : '' }}">{{ ($applicant_result_second_type != '') ? $applicant_result_second_type : '' }}</option>
                                                    <option value="NECO">NECO</option>
                                                    <option value="WAEC">WAEC</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('two_exam_type')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="two_exam_no" class="input-title">Exam No</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_second_no != '') ? $applicant_result_second_no : '' }}" type="text" name="two_exam_no" class="input-field mb-2">
                                                @error('two_exam_no')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="two_exam_year" class="input-title">Exam Year</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_second_year != '') ? $applicant_result_second_year : '' }}" type="text" name="two_exam_year" class="input-field mb-2">
                                                @error('two_exam_year')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <label for="two_exam_center" class="input-title">Exam Center</label><br>
                                            <div class="">
                                                <input value="{{ ($applicant_result_second_center != '') ? $applicant_result_second_center : '' }}" type="text" name="two_exam_center" class="input-field mb-2">
                                                @error('two_exam_center')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <!-- Subject  -->
                                            <label for="two_subject" class="input-title">Subject</label><br>
                                            @if(count($applicant_result_second) > 0)
                                                @foreach($applicant_result_second as $second)
                                                    <div class="lg:flex grid">
                                                        <div class="w-full mr-2">
                                                            <select type="text" name="two_subject_name[]" class="input-field mb-2 mr-10">
                                                                <option value="{{ $second->subject }}">{{ $second->subject }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="w-full">
                                                            <select type="text" name="two_subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                                                <option value="{{ $second->grade }}">{{ $second->grade }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                            <div class="lg:flex grid">
                                                <div class="w-full mr-2">
                                                    <select type="text" name="two_subject_name[]" class="input-field mb-2 mr-10">
                                                        <option value=""></option>
                                                        <option value="COMMERCE">COMMERCE</option>
                                                        <option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>
                                                        <option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>
                                                        <option value="ECONOMICS">ECONOMICS</option>
                                                        <option value="GEOGRAPHY">GEOGRAPHY</option>
                                                        <option value="GOVERNMENT">GOVERNMENT</option>
                                                        <option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>
                                                        <option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>
                                                        <option value="CIVIC EDUCATION">CIVIC EDUCATION</option>
                                                        <option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>
                                                        <option value="HAUSA">HAUSA</option>
                                                        <option value="IGBO">IGBO</option>
                                                        <option value="YORUBA">YORUBA</option>
                                                        <option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>
                                                        <option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>
                                                        <option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>
                                                        <option value="BIOLOGY">BIOLOGY</option>
                                                        <option value="CHEMISTRY">CHEMISTRY</option>
                                                        <option value="PHYSICS">PHYSICS</option>
                                                    </select>
                                                </div>
                                                <div class="w-full">
                                                    <select type="text" name="two_subject_grade[]" placeholder="Grade" class="input-field mb-2">
                                                        <option value=""></option>
                                                        <option value="A1">A1</option>
                                                        <option value="B2">B2</option>
                                                        <option value="B3">B3</option>
                                                        <option value="C4">C4</option>
                                                        <option value="C5">C5</option>
                                                        <option value="C6">C6</option>
                                                        <option value="D7">D7</option>
                                                        <option value="E8">E8</option>
                                                        <option value="F9">F9</option>
                                                    </select>
                                                </div>
                                                @error('two_subject')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                        <div id="two_subjectSection" class="my-4"></div>
                                        <div id="two_addField" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Add Subject + </div>
                                        <br><br>
                                        <div id="two_subjectSectionOption" class="my-4"></div>
                                        <div id="two_addFieldOption" class="bg-blue-800 text-white p-2 rounded float-right mb-3 text-xs cursor-pointer">Option + </div>
                                        <br><br>
                                    </div>
                                </div>
                            </div>

                            <!-- Indicator  -->
                            <div id="indicator" class="lg:flex grid justify-around my-5">
                                <a href="{{ route('application-registration-photo') }}" class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Back Step 2: Programme and Photo</a>
                                <button class="bg-green-700 text-white py-3 lg:px-12 text-xs lg:text-sm rounded mb-3 cursor-pointer">Next Step 4: Additional Qualifications</button>
                            </div>
                        </form>
                    </div>                    
                    <script>
                        // Add One Subject 
                        let one_addField = document.querySelector('#one_addField')
                        let one_subjectSection = document.querySelector('#one_subjectSection')
                        const divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<select type="text" name="one_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                                '<option value=""></option>'+
                                                '<option value="COMMERCE">COMMERCE</option>'+
                                                '<option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>'+
                                                '<option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>'+
                                                '<option value="ECONOMICS">ECONOMICS</option>'+
                                                '<option value="GEOGRAPHY">GEOGRAPHY</option>'+
                                                '<option value="GOVERNMENT">GOVERNMENT</option>'+
                                                '<option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>'+
                                                '<option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>'+
                                                '<option value="CIVIC EDUCATION">CIVIC EDUCATION</option>'+
                                                '<option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>'+
                                                '<option value="HAUSA">HAUSA</option>'+
                                                '<option value="IGBO">IGBO</option>'+
                                                '<option value="YORUBA">YORUBA</option>'+
                                                '<option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>'+
                                                '<option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>'+
                                                '<option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>'+
                                                '<option value="BIOLOGY">BIOLOGY</option>'+
                                                '<option value="CHEMISTRY">CHEMISTRY</option>'+
                                                '<option value="PHYSICS">PHYSICS</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="one_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        one_addField.addEventListener('click', ()=>{
                            one_subjectSection.insertAdjacentHTML('beforeend', divContent)
                        })

                        // Add One Subject 
                        let one_addFieldOption = document.querySelector('#one_addFieldOption')
                        let one_subjectSectionOption = document.querySelector('#one_subjectSectionOption')
                        const divContentOption = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<input type="text" name="one_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="one_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        one_addFieldOption.addEventListener('click', ()=>{
                            one_subjectSectionOption.insertAdjacentHTML('beforeend', divContentOption)
                        })

                        // Add Second Subject 
                        let two_addField = document.querySelector('#two_addField')
                        let two_SubjectSection = document.querySelector('#two_SubjectSection')
                        const two_divContent = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="two_subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<select type="text" name="two_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                                '<option value=""></option>'+
                                                '<option value="COMMERCE">COMMERCE</option>'+
                                                '<option value="FINANCIAL ACCOUNTING">FINANCIAL ACCOUNTING</option>'+
                                                '<option value="CHRISTIAN RELIGIOUS STUDIES">CHRISTIAN RELIGIOUS STUDIES</option>'+
                                                '<option value="ECONOMICS">ECONOMICS</option>'+
                                                '<option value="GEOGRAPHY">GEOGRAPHY</option>'+
                                                '<option value="GOVERNMENT">GOVERNMENT</option>'+
                                                '<option value="ISLAMIC STUDIES">ISLAMIC STUDIES</option>'+
                                                '<option value="LITERATURE IN ENGLISH">LITERATURE IN ENGLISH</option>'+
                                                '<option value="CIVIC EDUCATION">CIVIC EDUCATION</option>'+
                                                '<option value="ENGLISH LANGUAGE">ENGLISH LANGUAGE</option>'+
                                                '<option value="HAUSA">HAUSA</option>'+
                                                '<option value="IGBO">IGBO</option>'+
                                                '<option value="YORUBA">YORUBA</option>'+
                                                '<option value="FURTHER MATHEMATICS">FURTHER MATHEMATICS</option>'+
                                                '<option value="GENERAL MATHEMATICS">GENERAL MATHEMATICS</option>'+
                                                '<option value="AGRICULTURAL SCIENCE">AGRICULTURAL SCIENCE</option>'+
                                                '<option value="BIOLOGY">BIOLOGY</option>'+
                                                '<option value="CHEMISTRY">CHEMISTRY</option>'+
                                                '<option value="PHYSICS">PHYSICS</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="two_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        two_addField.addEventListener('click', ()=>{
                            two_subjectSection.insertAdjacentHTML('beforeend', two_divContent)
                        })

                        // Add Second Subject Option
                        let two_addFieldOption = document.querySelector('#two_addFieldOption')
                        let two_SubjectSectionOption = document.querySelector('#two_SubjectSectionOption')
                        const two_divContentOption = 
                                '<div class="border-b-2 my-2">'+
                                    '<label for="two_subject" class="input-title">Subject</label><br>'+
                                    '<div class="lg:flex grid">'+
                                        '<div class="w-full mr-2">'+
                                            '<input type="text" name="two_subject_name[]" placeholder="Subject Name" class="input-field mb-2 mr-10">'+
                                        '</div>'+
                                        '<div class="w-full">'+
                                            '<select type="text" name="two_subject_grade[]" placeholder="Grade" class="input-field mb-2">'+
                                                '<option value=""></option>'+
                                                '<option value="A1">A1</option>'+
                                                '<option value="B2">B2</option>'+
                                                '<option value="B3">B3</option>'+
                                                '<option value="C4">C4</option>'+
                                                '<option value="C5">C5</option>'+
                                                '<option value="C6">C6</option>'+
                                                '<option value="D7">D7</option>'+
                                                '<option value="E8">E8</option>'+
                                                '<option value="F9">F9</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'

                        two_addFieldOption.addEventListener('click', ()=>{
                            two_subjectSectionOption.insertAdjacentHTML('beforeend', two_divContentOption)
                        })
                        
                    </script>
                @endif
            </div>
        </div>
        <!-- System Password  -->
        @include('application.system_password')
    </div>
@endsection