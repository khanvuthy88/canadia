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
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">Title</th>
							<th scope="col">Family name</th>
							<th scope="col">Acc type</th>
							<th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($customers as $customer)
							<tr>
								<td>{{ $customer->title }}</td>
								<td>{{ $customer->family_name }}</td>
								<td>{{ $customer->acc_type }}</td>
								<td>{{ $customer->email }}</td>
								<td>{{ $customer->phone }}</td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic example">
										<button class="btn btn-secondary">
											<a href="{{ route('dashboard-customer-edit',$customer) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										</button>
										<button class="btn btn-danger">
											<a href="{{ route('dashboard-customer-destroy',$customer) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</button>
										<button class="btn btn-primary">
											<a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
										</button>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
			@else
				<p>There are no customer</p>
			@endif
		</div>
	</div>
@endsection
