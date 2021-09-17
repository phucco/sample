@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($request->sesssion->has('error'))
	<div class="alert alert-danger" role="alert">
		{{ $request->sesssion('error') }}
    </div>
@endif

@if ($request->sesssion->has('success'))
	<div class="alert alert-success" role="alert">
		{{ $request->sesssion('success') }}
    </div>
@endif
