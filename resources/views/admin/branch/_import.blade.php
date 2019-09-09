@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">Import Branch</div>
		<div class="card-body">
			{!! Form::open([
				'files'=>true
				]) !!}
				<div class="form-row">
					<div class="col-md-12">
						{!! Form::file('import_url', []) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12 mt-3">
						{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection