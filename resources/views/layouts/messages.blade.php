@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class=" text-red-400 py-2 text-sm">
            {{$error}}
		</div>
    @endforeach
@endif

@if(session('success'))
    <div class="text-green-600 py-2 text-sm">
        <h4>{{session('success')}}</h4>
	</div>
@endif


@if(session('error'))
    <div class="text-red-400 py-2 text-sm">
        <h4>{{session('error')}}</h4>
	</div>
@endif