@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Communes({{ $communes->count() }}) <a class="float-right" href="{{ route('dashboard-commune-create') }}">New Commune</a></div>
		<div class="card-body">
			@if($communes->count())
				<div class="row">
					@foreach($communes as $commune)
						<li class="col-md-4"><a href="{{ route('dashboard-commune-edit',$commune) }}">{{ $commune->name }}</a></li>
					@endforeach
				</div>
			@else
				<p>There are no commune</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $communes->links() }}
	</div>
@endsection