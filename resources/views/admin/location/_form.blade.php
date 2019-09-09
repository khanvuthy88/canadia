@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $location->exists ? 'Update location' : 'New location' }}
			@if($location->count())
				<a id="remove_action" data-id="{{ $location->id }}" href="{{ route('dashboard-location-destroy',$location) }}" class="float-right">Remove</a>
			@endif
		</div>
		<div class="card-body">
			{!! Form::model($location, [
					'method'=>'post',
					'route'=> $location->exists ? ['dashboard-location-update',$location] : ['dashboard-location-store']
				]) !!}

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('code', NULL, []) !!}
						{!! Form::number('code', $location->exists ? $location->code : NULL, ['class'=>'form-control','placeholder'=>
						'Province code']) !!}						
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('name', NULL, []) !!}
						{!! Form::text('name', $location->exists ? $location->name : NULL, ['class'=>'form-control','placeholder'=>
						'Province name']) !!}		
					</div>					
				</div>
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a id="cancel-button" href="{{ route('dashboard-location') }}" class="btn btn-danger">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('document').ready(function(){
			$('#remove_action').click(function(event){
				let id = $(this).attr('data-id');
				let url = $(this).attr('href');
				let cancel = $('#cancel-button').attr('href');
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
				  	axios.post(url)
				  	.then(function(res){
				  		if(res.status===200){
				  			swal({
				  				title: "Deleted",
				  				text : "Poof! Your imaginary file has been deleted!",
				  				icon : 'success',
				  				timer:'10000'
				  			});
				  			window.location.href=cancel;
				  		}
				  	})
				  	.catch(function(res){
				  		swal("Poof! Your imaginary file has not been deleted!", {
					      icon: "warning",
					    });
				  	});				   
				  }
				});
			});
		});
	</script>
@endsection