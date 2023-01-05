<div class="bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5 rounded">
    <h1 class="text-lg font-semibold py-4 w-full">Scratch Card</h1>
    @if(count($cards) > 0)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="w-full"">
                        <thead class="border-b">
                            <tr class="text-left whitespace-nowrap">
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    APPLICANT
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    CARD
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    APPLICATION YEAR
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                    TIME USED
                                </th>
                                <th scope="col" class="px-6 py-2  text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cards as $card)
                                <tr class="divide-y divide-gray-300 border-b-2">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $card->applicantName($card->email) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $card->pin }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $card->year }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ date('h:i:s l d, F Y', strtotime($card->created_at)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center mt-4">
                        {{ $cards->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-lg font-semibold py-4 w-full">No Card Used</h1>
    @endif
</div>