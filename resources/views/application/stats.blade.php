<!-- Stat  -->
<div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
    <div>
        <div class="font-medium mb-1 lg:text-lg">Welcome, </div>
        <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
            <div class="font-medium mb-1 text-sm">
                Application No: {{ Auth::guard('application')->user()->application_no }} <br>
                Name: {{ Auth::guard('application')->user()->name }} <br>
            </div>
        </div>
    </div>
</div>
<div class="lg:grid grid-cols-3 gap-3 lg:ml-4 lg:mr-8 mb-4 hidden">
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 lg:text-lg">Application:</div>
            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
            <div class="font-medium mb-1 text-sm">Payment Status: &nbsp;</div>
                <div class="font-medium mb-1 text-sm">
                    {{ Auth::guard('application')->user()->checkPaymentStatus() }}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 lg:text-lg">Application:</div>
            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                <div class="font-medium mb-1 text-sm">Application Status: &nbsp;</div>
                <div class="font-medium mb-1 text-sm">
                    {{ Auth::guard('application')->user()->checkRegistrationStatus() }} 
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-7 px-3 text-gray-600 my-5 rounded">
        <div>
            <div class="font-medium mb-1 lg:text-lg">Admission:</div>
            <div class="font-semibold mb-1 lg:text-2xl lg:flex items-center">
                <div class="font-medium mb-1 text-sm">Admission Status: &nbsp;</div>
                <div class="font-medium mb-1 text-sm">
                    {{ Auth::guard('application')->user()->applicantAdmissionStatus() }} 
                </div>
            </div>
        </div>
    </div>
</div>