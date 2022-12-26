<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4">Application</h1>
    <div class="items-center py-3 px-4">
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
    </div>
</div>