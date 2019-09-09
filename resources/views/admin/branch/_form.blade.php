@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $branch->exists ? 'Update branch' : 'New branch' }}</div>
		<div class="card-body">
			{!! Form::model($branch, [
					'method'=>'post',
					'route'=>$branch->exists ? ['dashboard-branch-update',$branch] : ['dashboard-branch-store']
				]) !!}

				<div class="form-row">
				    <div class="form-group col-md-12">
				    	{!! Form::label('branch_name', NULL, []) !!}
                        {!! Form::text('branch_name', $branch->exists ? $branch->name : NULL, ['class'=>'form-control','placeholder'=>'Branch name']) !!}
				    </div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('branch_longitude', NULL, []) !!}
						{!! Form::text('branch_longitude', $branch->exists ? $branch->longitude : NULL, ['class'=>'form-control','placeholder'=>'Longitude']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('branch_latitude', NULL, []) !!}
						{!! Form::text('branch_latitude', $branch->exists ? $branch->latitude : NULL, ['class'=>'form-control','placeholder'=>'Latitude']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('branch_location', NULL, []) !!}
						{!! Form::text('branch_location', $branch->exists ? $branch->address : NULL, ['class'=>'form-control','placeholder'=>'Location']) !!}
					</div>
				</div> 


				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a href="{{ route('dashboard-branch') }}" class="btn btn-danger">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection