@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Districts({{ $districts->count() }}) <a class="float-right" href="{{ route('dashboard-district-create') }}">New district</a></div>
		<div class="card-body">
			@if($districts->count())
				<div class="row">
				@foreach($districts as $district)
					<li class="col-md-4"><a href="{{ route('dashboard-district-edit',$district) }}">{{ $district->name }}</a></li>
				@endforeach
			</div>
			@else
				<p>There are no district</p>
			@endif
		</div>
	</div>
	<div class="mt-3">
		{{ $districts->links() }}
	</div>
@endsection