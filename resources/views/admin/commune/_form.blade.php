@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $commune->exists ? 'Update Commune' : 'New Commune' }}</div>
		<div class="card-body">
			{!! Form::model($commune, [
					'method'=>'post',
					'route'=>$commune->exists ? ['dashboard-commune-update',$commune] : ['dashboard-commune-store']
				]) !!}
				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('code', NULL, []) !!}
						{!! Form::number('code', $commune->exists ? $commune->code : NULL, ['class'=>'form-control','placeholder'=>'Code']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('name', NULL, []) !!}
						{!! Form::text('name', $commune->exists ? $commune->name : NULL, ['class'=>'form-control','placeholder'=>'Name']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('district', NULL, []) !!}
						{!! Form::select('district_id', $district_list, $commune->exists ? $commune->district_id : NULL, ['class'=>'form-control']) !!}
					</div>
				</div>
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a href="{{ route('dashboard-commune') }}" title="Cancel" class="btn btn-danger">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection