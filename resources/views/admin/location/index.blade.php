@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Location ({{ $locations->count() }}) <a href="{{ route('dashboard-location-create') }}" class="float-right">New province</a></div>
		<div class="card-body">
			@if($locations->count())
				<div class="row">
					@foreach($locations as $location)
						<li class="col-md-4"><a href="{{ route('dashboard-location-edit',$location) }}">{{ $location->name }}</a></li>
					@endforeach
				</div>
			@else
				<p>There are no location</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $locations->links() }}
	</div>
@endsection