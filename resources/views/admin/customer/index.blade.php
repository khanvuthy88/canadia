@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">All Customers ({{ $customers->count() }})
			<div class="search-container">
				{!! Form::open([
						'method'=>'post',
						'route'	=>'search-account'
					]) !!}
					{!! Form::text('search', NULL, ['placeholder'=>'Search ...']) !!}
					<button type="submit"><i class="fa fa-search"></i></button>
			    {!! Form::close() !!}
			  </div>			
		<a href="{{ route('dashboard-customer-create') }}" class="float-right">New customer</a></div>
		<div class="card-body">
			@if($customers->count())
				@foreach($customers as $customer)
					<li><a href="{{ route('dashboard-customer-edit',$customer) }}">{{ $customer->title }}</a></li>
				@endforeach
			@else
				<p>There are no customer</p>
			@endif
		</div>
	</div>
@endsection