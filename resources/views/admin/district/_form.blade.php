@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $district->exists ? 'Update district' : 'New district' }}<a class="float-right" id="remove_action" href="{{ route('dashboard-district-remove',$district) }}">Remove</a></div>
		<div class="card-body">
			{!! Form::model($district, [
					'method'=>'post',
					'route'=>$district->exists ? ['dashboard-district-update',$district] : ['dashboard-district-store']
				]) !!}
				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('code', NULL, []) !!}
						{!! Form::number('code', $district->exists ? $district->code : NULL, ['class'=>'form-control','placeholder'=>'Code']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('name', NULL, []) !!}
						{!! Form::text('name', $district->exists ? $district->name : NULL, ['class'=>'form-control','placeholder'=>'Name']) !!}
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('district', NULL, []) !!}
						{!! Form::select('district_id', $province_list, $district->exists ? $district->province_id : NULL, ['class'=>'form-control']) !!}
					</div>
				</div>
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a href="{{ route('dashboard-district') }}" class="btn btn-danger">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('script')
	<script>
		document.getElementById("remove_action").addEventListener("click", function(event){
			event.preventDefault();
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("Poof! Your imaginary file has been deleted!", {
			      icon: "success",
			    });
			  }
			});
		});
	</script>
@endsection