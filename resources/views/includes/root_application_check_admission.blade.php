<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">Check Admission</h1>
    @if(count($check_admissions) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    EMAIL
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    PROGRAMME SELECTED
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    PROGRAMME ADMITTED
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    STATUS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($check_admissions as $check_admission)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $check_admission->applicant_email }}
                                    </td>
                                    <td>
                                        {{ $check_admission->programme($check_admission->programme) }}
                                    </td>
                                    <td>
                                        {{ $check_admission->programme($check_admission->programme_admitted) }}
                                    </td>
                                    <!-- <td class="px-6 py-4 text-sm text-gray-500"> -->
                                        {{-- $check_admission->dateFormat($check_admission->created_at) --}}
                                    <!-- </td> -->
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <span class="flex">
                                            Admitted
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{ $check_admissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No admission Found</h1>
    @endif
</div>