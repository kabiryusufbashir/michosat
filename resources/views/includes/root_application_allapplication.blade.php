<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">All Applications</h1>
    @if(count($registrations) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    NAME
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    YEAR
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    PAYMENT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    ADMISSION STATUS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->year }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->applicantPaymentStatus($registration->email) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $registration->applicantAdmissionStatus($registration->email) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{ $registrations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Application Found</h1>
    @endif
</div>