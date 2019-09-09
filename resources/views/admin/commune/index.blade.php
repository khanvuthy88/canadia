@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Communes({{ $communes->count() }}) <a class="float-right" href="{{ route('dashboard-commune-create') }}">New Commune</a></div>
		<div class="card-body">
			@if($communes->count())
				@foreach($communes as $commune)
					<li><a href="{{ route('dashboard-commune-edit',$commune) }}">{{ $commune->name }}</a></li>
				@endforeach
			@else
				<p>There are no commune</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $communes->links() }}
	</div>
@endsection