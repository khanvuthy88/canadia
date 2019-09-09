@extends('layouts.admin')
@section('content')
	<div class="card">
		<div class="card-header">Branch ({{ $branchs->count() }}) <a class="float-right" href="{{ route('dashboard-branch-create') }}">New Branch</a></div>
		<div class="card-body">
			@if($branchs->count())
				@foreach($branchs as $branch)
					<li><a href="{{ route('dashboard-branch-edit',$branch->id) }}"> {{ $branch->name }} </a></li>
				@endforeach
				{{ $branchs->links() }}
			@else
				<p>There are no branch.</p>
			@endif
		</div>
	</div>	
	<div class="mt-3">
		{{ $branchs->links() }}
	</div>			
@endsection