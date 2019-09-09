@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Village ({{ $villages->count() }}) <a href="{{ route('dashboard-village-create') }}" class="float-right">New village</a></div>
		<div class="card-body">
			@if($villages->count())
				<div class="row">
					@foreach($villages as $village)
						<li class="col-md-4"><a href="{{ route('dashboard-village-edit',$village) }}">{{ $village->name }}</a></li>
					@endforeach
				</div>
			@else
				<p>There are no village</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $villages->links() }}
	</div>
@endsection