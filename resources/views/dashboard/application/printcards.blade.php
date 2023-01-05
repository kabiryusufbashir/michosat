<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Print Slip</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/production.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @vite('resources/css/app.css')
        <style type="text/css">
            @page { size: auto;  margin: 0mm; }
            @page {
            size: A4;
            margin: 0;
            }
            
            @media print {
            html, body {
                width: 210mm;
                height: 287mm;
                font-size: 10px;
            }

            html {

            }
            ::-webkit-scrollbar {
                width: 0px;  /* remove scrollbar space */
                background: transparent;  /* optional: just make scrollbar invisible */
            }
        </style>
    </head>
    <body>
        <div class="mt-2">
            <!-- Print Scratch Cards  -->
            <div class="flex justify-between px-6 items-center">
                <div class="col-span-1">
                    <img class="w-24" src="{{ $school->photo }}" alt="">
                </div>
                <div class="col-span-2">
                    <div class="font-semibold text-xl text-center">Application Scratch Cards</div>
                    <div class="font-semibold text-xl text-center">Card Generated: {{ count($cards) }}</div>
                </div>
                <div class="col-span-2">
                    <div class="font-semibold text-xl text-center">{{ $school->name }}</div>
                </div>
            </div>
            <!-- Result -->
            @if($cards)
                <div class="grid grid-cols-4 gap-4 bg-white py-3 px-6 ml-4 mr-8 text-gray-600 my-5">
                    @foreach($cards as $card)
                        <div class="border p-4 text-sm">
                            <div>
                                Pin: <b>{{ $card->pin }}</b>
                            </div>
                            <div>
                                Application Year: <b>{{ $card->application_year }}</b>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif     
        </div>
        <div class="w-full fixed text-center bottom-0 text-xs">
            <div>
                <div>A Product Bitcags IT</div>
                <div>Date Generated: {{ date('h:i:s l d, F Y', strtotime($card))  }}</div>
            </div> 
        </div>
        <script type="text/javascript">
            window.print()
            /* setTimeout(function () {
                window.close();
                window.location = '../../../application/dashboard';
           }, 500); */
        </script>
    </body>
</html>