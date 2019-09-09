@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Location ({{ $locations->count() }}) <a href="{{ route('dashboard-location-create') }}" class="float-right">New province</a></div>
		<div class="card-body">
			@if($locations->count())
				@foreach($locations as $location)
					<li><a href="{{ route('dashboard-location-edit',$location) }}">{{ $location->name }}</a></li>
				@endforeach
			@else
				<p>There are no location</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $locations->links() }}
	</div>
@endsection