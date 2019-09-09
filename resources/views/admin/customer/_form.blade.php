@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">{{ $customer->exists ? 'Update customer' : 'New customer' }} 
			@if($customer->exists)
				<a data-id="{{ $customer->id }}" id="remove_action" href="{{ route('dashboard-customer-destroy',$customer) }}" class="float-right">Remove</a>
			@endif
		</div>
		<div class="card-body">
			{!! Form::model($customer, [
					'method'=>'post',
					'route'=> $customer->exists ? ['dashboard-customer-update',$customer] : ['dashboard-customer-store'],
					'files' => true
				]) !!}

				<div class="form-row">
					<div class="form-group col-md-2">
						{!! Form::label('title', Null, []) !!}
						{!! Form::select('title', ['mr'=>"Mr",'mrs'=>"Mrs",'miss'=>'Miss'], 'mr', ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-5">
						{!! Form::label('family_name', NULL, []) !!}
						{!! Form::text('family_name', $customer->exists ? $customer->family_name : NULL, ['class'=>'form-control','placeholder'=>'Family name']) !!}
					</div>
					<div class="form-group col-md-5">
						{!! Form::label('given_name', NULL, []) !!}
						{!! Form::text('given_name', $customer->exists ? $customer->given_name : NULL, ['class'=>'form-control','placeholder'=>'Given name']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						{!! Form::label('date_of_birth', NULL, []) !!}
						{!! Form::date('dob', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-9">
						{!! Form::label('place_of_birth', NULL, []) !!}
						{!! Form::text('pob', $customer->exists ? $customer->pob : NULL, ['class'=>'form-control','placeholder'=>'Place of birth']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('identity_document', NULL, []) !!}
						{!! Form::file('identity_document', []) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('identity_number', NULL, []) !!}
						{!! Form::text('identity_number', $customer->exists ? $customer->identity_number : NULL, ['class'=>'form-control','placeholder'=>'Identify number']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						{!! Form::label('passport_issued_country', NULL, []) !!}
						{!! Form::text('passport_issued_country', $customer->exists ? $customer->passport_issued_country : NULL, ['class'=>'form-control','placeholder'=>'Passport issued country']) !!}
					</div>
					<div class="form-group col-md-4">
						{!! Form::label('issued_date', NULL, []) !!}
						{!! Form::date('issued_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-4">
						{!! Form::label('expired_date', NULL, []) !!}
						{!! Form::date('expired_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
					</div> 
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('email', NULL, []) !!}
						{!! Form::email('email', $customer->exists ? $customer->email : NULL, ['class'=>'form-control','placeholder'=>'Your email address']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('phone', NULL, []) !!}
						{!! Form::number('phone', $customer->exists ? $customer->phone : NULL, ['class'=>'form-control','placeholder'=>'Your phone number']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('why_open_account', NULL, []) !!}
						{!! Form::text('why_open_account', $customer->exists ? $customer->why_open_account : NULL, ['class'=>'form-control', 'placeholder'=>'Why open account']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('know_by', NULL, []) !!}
						{!! Form::text('know_by', $customer->exists ? $customer->know_by : NULL, ['class'=>'form-control','placeholder'=>'Know by ...']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('professional_situation', NULL, []) !!}
						{!! Form::text('professional_situation', $customer->exists ? $customer->professional_situation : NULL, ['class'=>'form-control','placeholder'=>'Your professional sistuation']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('position', Null, []) !!}
						{!! Form::text('position', $customer->exists ? $customer->position : NULL, ['class'=>'form-control','placeholder'=>'Your position']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('company_name', NULL, []) !!}
						{!! Form::text('company_name', $customer->exists ? $customer->company_name : NULL, ['class'=>'form-control','placeholder'=>'Company name']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('business_type', NULL, []) !!}
						{!! Form::text('business_type', $customer->exists ? $customer->business_type : NULL, ['class'=>'form-control','placeholder'=>'Business type']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('source_of_income', NULL, []) !!}
						{!! Form::text('source_of_income', $customer->exists ? $customer->source_of_income : NULL, ['class'=>'form-control','placeholder'=>'Source of income']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('monthly_income', NULL, []) !!}
						{!! Form::text('monthly_income', $customer->exists ? $customer->monthly_income : NULL, ['class'=>'form-control','placeholder'=>'Monthly income']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('main_nationality', NULL, []) !!}
						{!! Form::text('main_nationality', $customer->exists ? $customer->main_nationality : NULL, ['class'=>'form-control','placeholder'=>'Main nationality']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('second_nationality', NULL, []) !!}
						{!! Form::text('second_nationality', $customer->exists ? $customer->second_nationality : NULL, ['class'=>'form-control','placeholder'=>'Second nationality']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('reference_code', NULL, []) !!}
						{!! Form::text('reference_code', $customer->exists ? $customer->reference_code : NULL, ['class'=>'form-control','placeholder'=>'Reference code']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('acc_facility', NULL, []) !!}
						{!! Form::text('acc_facility', $customer->exists ? $customer->acc_facility : NULL, ['class'=>'form-control','placeholder'=>'Account facility']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('acc_currency', NULL, []) !!}
						{!! Form::text('acc_currency', $customer->exists ? $customer->acc_currency : NULL, ['class'=>'form-control','placeholder'=>'Account currency']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('acc_pin_number', NULL, []) !!}
						{!! Form::text('acc_pin_number', $customer->exists ? $customer->acc_pin_number : NULL, ['class'=>'form-control','placeholder'=>'Account pin number']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('acc_your3_d_security', NULL, []) !!}
						{!! Form::text('acc_your3_d_security', $customer->exists ? $customer->acc_your3_d_security : NULL, ['class'=>'form-control','placeholder'=>'Account year 3rd security']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('acc_type', NULL, []) !!}
						{!! Form::text('acc_type', $customer->exists ? $customer->acc_type : NULL, ['class'=>'form-control','placeholder'=>'Account type']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('acc_term_deposit', NULL, []) !!}
						{!! Form::text('acc_term_deposit', $customer->exists ? $customer->acc_term_deposit : NULL, ['class'=>'form-control','placeholder'=>'Account term deposit']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('house_number', NULL, []) !!}
						{!! Form::text('house_number', $customer->exists ? $customer->house_number : NULL, ['class'=>'form-control','placeholder'=>'House number']) !!}
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('street', NULL, []) !!}
						{!! Form::text('street', $customer->exists ? $customer->street : NULL, ['class'=>'form-control','placeholder'=>'Account street']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('branch_location', NULL, []) !!}
						{!! Form::select('branch_location_id', $branchArray, $customer->exists ? $customer->branch_location_id : NULL, ['class'=>'form-control','placeholder'=>'Branch Location']) !!}
					</div>					
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						{!! Form::label('province', NULL, []) !!}
						{!! Form::select('province_id', $provinceArray, $customer->exists ? $customer->province_id : NULL, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-3">
						{!! Form::label('district', NULL, []) !!}
						{!! Form::select('district_id', $districtArray, $customer->exists ? $customer->district_id : NULL, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-3">
						{!! Form::label('commune', NULL, []) !!}
						{!! Form::select('commune_id', $provinceArray, $customer->exists ? $customer->commune_id : NULL, ['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-3">
						{!! Form::label('village', NULL, []) !!}
						{!! Form::select('village_id', $districtArray, $customer->exists ? $customer->village_id : NULL, ['class'=>'form-control']) !!}
					</div>
				</div>

				
				
				
				{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
				<a id="cancel_action" href="{{ route('dashboard-customer') }}" class="btn btn-danger">Cancel</a>
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

