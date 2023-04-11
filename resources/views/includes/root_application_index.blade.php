<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Application</h1>
    <div class="items-center py-3 px-4">
        <!-- Generate Card -->
        <a href="#">
            <div id="generateCardLink" class="settings-menu-div">
                <span class="bg-green-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Generate Card</h1>
                </span>
            </div>
        </a>
        <!-- All Card -->
        <a href="{{ route('root-all-card') }}">
            <div class="settings-menu-div">
                <span class="bg-red-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Card</h1>
                </span>
            </div>
        </a>
        <!-- Used Card -->
        <a href="{{ route('root-used-card') }}">
            <div class="settings-menu-div">
                <span class="bg-red-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Used Card</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('all-application') }}">
            <div class="settings-menu-div">
                <span class="bg-yellow-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>All Application</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('check-payment') }}">
            <div class="settings-menu-div">
                <span class="bg-blue-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Confirm Application Payment</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('check-application') }}">
            <div class="settings-menu-div">
                <span class="bg-orange-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Check Application</h1>
                </span>
            </div>
        </a>
        <!-- All registration -->
        <a href="{{ route('check-admission') }}">
            <div class="settings-menu-div">
                <span class="bg-orange-300 p-2 rounded-full">
                    @include('icons.registration')
                </span>
                &nbsp;&nbsp;
                <span>
                    <h1>Check Admission</h1>
                </span>
            </div>
        </a>
    </div>
</div>