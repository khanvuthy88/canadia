@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $village->exists ? 'Update village' : 'New village' }} 
			@if($village->exists)
				<a data-id="{{ $village->id }}" id="remove_action" href="{{ route('dashboard-village-destroy',$village) }}" class="float-right">Remove</a>
			@endif
		</div>
		<div class="card-body">
			{!! Form::model($village, [
					'method'=>'post',
					'route'=> $village->exists ? ['dashboard-village-update',$village] : ['dashboard-village-store']
				]) !!}

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('code', NULL, []) !!}
						{!! Form::number('code', $village->exists ? $village->code : NULL, ['class'=>'form-control','placeholder'=>
						'Province code']) !!}						
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('name', NULL, []) !!}
						{!! Form::text('name', $village->exists ? $village->name : NULL, ['class'=>'form-control','placeholder'=>
						'Province name']) !!}		
					</div>					
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						{!! Form::label('commune', NULL, []) !!}
						{!! Form::select('commune_id', $communeArray, $village->exists ? $village->commune_id : NULL, ['class'=>'form-control']) !!}
					</div>
				</div> 
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a id="cancel_action" href="{{ route('dashboard-village') }}" class="btn btn-danger">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('document').ready(function(){
			let cancel = $('#cancel_action').attr('href');
			$('#remove_action').click(function(event){
				event.preventDefault();
				let url = $('#remove_action').attr('href');
				let id = $(this).attr('data-id');				
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
				  		if(res.status === 200){
				  			swal({
				  				title: "Deleted",
				  				text : "Poof! Your imaginary file has been deleted!",
				  				icon : 'success',
				  				// timer:'10000'
				  				clickConfirm :() =>{
				  					console.log("Clicked");
				  				}
				  			});
				  		}
				  	})
				  	.catch(function(res){
				  		swal({
			  				title: "Error",
			  				text : "Poof! Your imaginary file has not been deleted!",
			  				icon : 'warning'
			  			});
				  	});			    
				  }
				});
			});
			
		});	
	</script>
@endsection
