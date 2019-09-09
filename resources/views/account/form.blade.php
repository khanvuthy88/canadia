@extends('layouts.app')


@section('custom-style')
	<style type="text/css">
		#regForm {
		  background-color: #ffffff;
		  margin: 30px auto;
		  padding: 40px;
		  /*width: 70%;*/
		  min-width: 300px;
		}
		/* Hide all steps by default: */
		.tab {
		  display: none;
		}
		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none; 
		  border-radius: 50%;
		  display: inline-block;
		  opacity: 0.5;
		}

		/* Mark the active step: */
		.step.active {
		  opacity: 1;
		}

		/* Mark the steps that are finished and valid: */
		.step.finish {
		  background-color: #4CAF50;
		}
		/* Mark input boxes that gets an error on validation: */
		input.invalid {
		  background-color: #ffdddd;
		}


	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				{!! Form::open([
					'route'=>'account-front-store',
					'method'=>'post',
					'files'=>true,
					"id"=>"regForm"
					]) !!}
					{!! Form::hidden('account', $account, []) !!}
					<div class="tab">
						<h1>Your information</h1>
						<div class="form-row">
							<div class="form-group col-md-2">
								{!! Form::label('your title', NULL, []) !!}
								{!! Form::select('title', ['mr'=>"Mr",'mrs'=>"Mrs",'miss'=>'Miss'], 'mr', ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-5">
								{!! Form::label('family_name', NULL, []) !!}
								{!! Form::text('family_name',  NULL, ['class'=>'form-control','placeholder'=>'Family name']) !!}
							</div>
							<div class="form-group col-md-5">
								{!! Form::label('given_name', NULL, []) !!}
								{!! Form::text('given_name', NULL, ['class'=>'form-control','placeholder'=>'Given name']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								{!! Form::label('date_of_birth', NULL, []) !!}
								{!! Form::date('dob', \Illuminate\Support\Carbon::now(), ['class'=>'form-control','id'=>'dob']) !!}
							</div>
							<div class="form-group col-md-9">
								{!! Form::label('place_of_birth', NULL, []) !!}
								{!! Form::text('pob', NULL, ['class'=>'form-control','placeholder'=>'Place of birth']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('main_nationality', NULL, []) !!}
								{!! Form::select('main_nationality', $countryArray, NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('second_nationality', NULL, []) !!}
								{!! Form::select('second_nationality', $countryArray, NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
					</div>
					<div class="tab">
						<h1>Your Detail</h1>
						<div class="form-row">
							<div class="form-group col-md-6">								
								{!! Form::label('identity_number', NULL, []) !!}
								{!! Form::number('identity_number', NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('passport_issued_country', NULL, []) !!}
								{!! Form::text('passport_issued_country', NULL, ['class'=>'form-control']) !!}
							</div>							
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="form-group col-md-6">
									{!! Form::label('identity_document', NULL, []) !!}
									{!! Form::file('identity_document', []) !!}
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('issued_date', NULL, []) !!}
								{!! Form::date('issued_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('expired_date', NULL, []) !!}
								{!! Form::date('expired_date', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('email', NULL, []) !!}
								{!! Form::email('email', NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('phone', NULL, []) !!}
								{!! Form::number('phone', NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
					</div>
					<div class="tab">
						<h1>Residential Address</h1>
						<div class="form-row">
							<div class="form-group col-md-4">
								{!! Form::label('house_number', NULL, []) !!}
								{!! Form::text('house_number', NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-8">
								{!! Form::label('street', NULL, []) !!}
								{!! Form::text('street', NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="row">
									<div class="form-group col-md-6">
										{!! Form::label('province', NULL, []) !!}
										{!! Form::select('province_id', $provincesArray, NULL, ['class'=>'form-control','id'=>'province_id']) !!}
									</div>
									<div class="form-group col-md-6">
										{!! Form::label('district', NULL, []) !!}
										{!! Form::select('district_id', $districtArray, NULL, ['class'=>'form-control','id'=>
										 'district_id']) !!}
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="row">
									<div class="form-group col-md-6">
										{!! Form::label('commune', NULL, []) !!}
										{!! Form::select('commune_id', $communeArray, NULL, ['class'=>'form-control','id'=>'commune_id']) !!}
									</div>
									<div class="form-group col-md-6">
										{!! Form::label('village', NULL, []) !!}
										{!! Form::select('village_id', $villageArray, NULL, ['class'=>'form-control','id'=>'village_id']) !!}
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="tab">
						<h1>Employment Details</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('Employment Details', NULL, []) !!}
								{!! Form::select('professional_situation', ['employed'=>"Employed","self-employed"=>"Self-Employed","unemployed"=>"Unemployed","retired"=>"Retired","student"=>"Student","housewife"=>"Housewife","others"=>"Others"],NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('Occupation/Position', NULL, []) !!}
								{!! Form::select('position', ["OC001"=>"Military/National Defense","OC002"=>"Law Enforcement","OC003"=>"Government","OC004"=>"Manager/Executive","OC005"=>"Financial Professional","OC006"=>"Legal Professional","OC007"=>"IT Professional","OC008"=>"Engineering/Scientific","OC009"=>"Writer/Journalist/Media","OC010"=>"Other Professional","OC011"=>"Agriculture/Fisheries Worker","OC012"=>"Domestic Worker","OC013"=>"Factory Worker","OC014"=>"Transportation Worker","OC015"=>"Artist/Musician","OC016"=>"Clerical","OC017"=>"Construction","OC018"=>"Education","OC019"=>"Hospitality","OC020"=>"Tourism","OC021"=>"General Laborer","OC022"=>"Non-profit","OC023"=>"Self-Employed","OC024"=>"Unemployed","OC025"=>"Other"], NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('company_name', NULL, []) !!}
								{!! Form::text('company_name', NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('business_type', NULL, []) !!}
								{!! Form::select('business_type', ["B"=>"Agriculture, Forestry and Fishery","E"=>"Construction and Real Estate","A"=>"Financial Institution","K"=>"Government","D"=>"Industry and Handcraft","M"=>"Media and Information sharing","C"=>"Minning","L"=>"Non-Profit Organization","J"=>"Professional service","I"=>"Technical Service","H"=>"Tourism, Art and entertainment","G"=>"Trading","F"=>"Transportation and logistic"], NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('source_of_income', NULL, []) !!}
								{!! Form::select('source_of_income', ['salary'=>'Salary','business'=>'Business','saving-investment'=>'Saving/Investment','inheritance'=>'Inheritance','property-assets'=>'Property/Assets','rental-income'=>'Rental Income','support-from-family'=>'Support from Family','others'=>'Others'], NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('passport_issued_country', NULL, []) !!}
								{!! Form::text('passport_issued_country', NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('monthly_income', NULL, []) !!}
								{!! Form::number('monthly_income', NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
					</div>
					<div class="tab">
						<h1>Tell Us More</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('Purpose of opening the account?', NULL, []) !!}
								{!! Form::select('why_open_account', ['saving-investment'=>'Saving/Investment','retirement'=>'Retirement','family-security'=>'Family Security','everyday-banking'=>'Everyday Banking','others'=>'Others'], NULL, ['class'=>'form-control']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::label('How did you know about this product?', NULL, []) !!}
								{!! Form::select('know_by', ['television'=>'Television','radio'=>'Radio','newspaper'=>'Newspaper','booklet'=>'Booklet','aba-staff'=>'ABA Staff','aba-customer'=>'ABA Customer','friends-relative-referral'=>'Friends, relative referral','aba-website'=>'ABA Website','aba-facebook-page'=>'ABA Facebook Page'], NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('Are you a US Person?', NULL, []) !!}
								{!! Form::select('is_us_person', ['yes'=>'Yes','no'=>'NO'], NULL, ['class'=>'form-control']) !!}
							</div>
						</div>
					</div>
					<div class="tab">
						<h1>Select Account Currency</h1>
						<div class="form-row">
							<div class="form-group col-md-6">
								{!! Form::label('Select Account Currency', NULL, []) !!}
								{!! Form::select('acc_currency', ['KH'=>'Khmer Riel (KHR)','US'=>'US Dollar (USD)'], NULL, ['class'=>'form-control']) !!}
							</div>
							<div  class="form-group col-md-6">
								{!! Form::label('Select Free Additional Services (Multiple Choice)', NULL, []) !!}
								{!! Form::checkbox('mobile-application', NULL, NULL) !!}
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-canadia text-white" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    				<button type="button" class="btn btn-canadia text-white" id="nextBtn" onclick="nextPrev(1)">Next</button>
    				<div style="text-align:center;margin-top:40px;">
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>	
@endsection

@section('script')
	<script type="text/javascript">
		var currentTab = 0;
		showTab(currentTab);

		function showTab(n) {
		  var x = document.getElementsByClassName("tab");
		  x[n].style.display = "block";
		  if (n == 0) {
		    document.getElementById("prevBtn").style.display = "none";
		  } else {
		    document.getElementById("prevBtn").style.display = "inline";
		  }
		  if (n == (x.length - 1)) {
		    document.getElementById("nextBtn").innerHTML = "Submit";
		  } else {
		    document.getElementById("nextBtn").innerHTML = "Next";
		  }
		  fixStepIndicator(n)
		}

		function nextPrev(n) {
		  var x = document.getElementsByClassName("tab");
		  if (n == 1 && !validateForm()) return false;
		  x[currentTab].style.display = "none";
		  currentTab = currentTab + n;
		  if (currentTab >= x.length) {
		    document.getElementById("regForm").submit();
		    return false;
		  }
		  showTab(currentTab);
		}

		function validateForm() {
		  var x, y, i, valid = true;
		  x = document.getElementsByClassName("tab");
		  y = x[currentTab].getElementsByTagName("input");
		  for (i = 0; i < y.length; i++) {
		    if (y[i].value == "") {
		      y[i].className += " invalid";
		      valid = false;
		    }
		  }

		  if (valid) {
		    document.getElementsByClassName("step")[currentTab].className += " finish";
		  }
		  return valid;
		}

		function fixStepIndicator(n) {
		  var i, x = document.getElementsByClassName("step");
		  for (i = 0; i < x.length; i++) {
		    x[i].className = x[i].className.replace(" active", "");
		  }
		  x[n].className += " active";
		}
		$(document).ready(function(){
			window.addEventListener("beforeunload", function(event) {
			    event.returnValue = "Your custom message.";
			});
			$('#district_id').empty();
			$('#commune_id').empty();
			$('#village_id').empty();
			$('#province_id').change(function(){
				$('#district_id').empty();
				$('#commune_id').empty();
				axios.post('http://canadia.local/account/province-change/'+$(this).val())
				.then(({data})=>{
					if(data.length>0){
						$(data).each(function(i, v){
							if(i==0){
								$('#district_id').append($("<option>", { selected:true, value: v['id'], html: v['name'] }));
							}else{
								$('#district_id').append($("<option>", { value: v['id'], html: v['name'] }));
							}							
						});

					}
				});
			});
			
			$('#district_id').change(function(){
				$('#commune_id').empty();
				axios.post('http://canadia.local/account/province-district/'+$(this).val())
				.then(({data})=>{
					if(data.length>0){
						$(data).each(function(i, v){
							console.log(i,v);
							$('#commune_id').append($("<option>", { value: v['id'], html: v['name'] }));
						});

					}
				});
			});
			$('#commune_id').change(function(){
				$('#village_id').empty();
				axios.post('http://canadia.local/account/province-commune/'+$(this).val())
				.then(({data})=>{
					if(data.length>0){
						$(data).each(function(i, v){
							console.log(i,v);
							$('#village_id').append($("<option>", { value: v['id'], html: v['name'] }));
						});

					}
				});
			});
			
			$('#dob').val('');
			$('#dob').change(function(){
				axios.post('http://canadia.local/account/dob-check/'+$(this).val())
				.then(({data})=>{
					if(data <18){
						swal({
							title: 'You are too young',
							text: 'Your age to young, only 18 year or above can create account',
							icon: 'warning',
							dangerMode: true,
						});
						$(this).val('');
					}
				});
			});
			$('#identity_number').change(function(){
				axios.post('http://canadia.local/account/identify-check/'+$(this).val())
				.then(({data})=>{
		   			if(data == true){
		   				swal({
						  title: "Already exist",
						  text: "Your identify number already exist, please try another one.",
						  icon: "warning",
						  dangerMode: true,
						});
		   				
		   				$(this).val('');
		   			}
		   		})
				.catch(function (error) {
				    // handle error
				    console.log(error);
				})
			});
			$('#email').change(function(){
				axios.post('http://canadia.local/account/email-check/'+$(this).val())
				.then(({data})=>{
					if(data == true){
						swal({
						  title: "Already exist",
						  text: "Your email account already exist, please try another one.",
						  icon: "warning",
						  dangerMode: true,
						});
		   				
		   				$(this).val('');
					};
				});
			});
			$('#phone').change(function(){
				axios.post('http://canadia.local/account/phone-check/'+$(this).val())
				.then(({data})=>{
					if(data == true){
						swal({
						  title: "Already exist",
						  text: "Your phone number already exist, please try another one.",
						  icon: "warning",
						  dangerMode: true,
						});
		   				
		   				$(this).val('');
					};
				});
			});
			
		});
	</script>
@endsection