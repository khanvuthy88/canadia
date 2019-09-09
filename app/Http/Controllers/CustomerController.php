<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\BranchLocation;
use App\Province;
use App\District;
use App\Commune;
use App\Village;
use Carbon\Carbon;
use App\Country;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        $provinceArray= array_pluck(Province::all(),'name','id');
        $districtArray= array_pluck(District::all(),'name','id');
        $communeArray= array_pluck(Commune::all(),'name','id');
        $villageArray = array_pluck(Village::all(),'name','id');
        $branchArray = array_pluck(BranchLocation::all(),'name','id');
        

        return view('admin.customer._form',compact('provinceArray','districtArray','communeArray','villageArray','customer','branchArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $file = $request->file('identity_document');
        $filename = 'identity_document-' . time() . '.' . $file->getClientOriginalExtension();
        $customer->title = $request['title'];
        $customer->family_name= $request['family_name'];
        $customer->middle_name= $request['middle_name'];
        $customer->given_name= $request['given_name'];
        $customer->dob= $request['dob'];
        $customer->pob= $request['pob'];
        $customer->identity_document = $file->storeAs('identity_document', $filename);
        $customer->identity_number= $request['identity_number'];
        $customer->passport_issued_country= $request['passport_issued_country'];
        $customer->issued_date= $request['issued_date'];
        $customer->expired_date= $request['expired_date'];
        $customer->email= $request['email'];
        $customer->phone= $request['phone'];
        $customer->why_open_account= $request['why_open_account'];
        $customer->know_by= $request['know_by'];
        $customer->professional_situation= $request['professional_situation'];
        $customer->position= $request['position'];
        $customer->company_name = $request['company_name'];
        $customer->business_type= $request['business_type'];
        $customer->source_of_income= $request['source_of_income'];
        $customer->monthly_income= $request['monthly_income'];
        $customer->main_nationality= $request['main_nationality'];
        $customer->second_nationality= $request['second_nationality'];
        $customer->is_us_person = $request['is_us_person'];
        $customer->cif= $request['cif'];
        $customer->reference_code= $request['reference_code'];
        $customer->acc_facility = $request['acc_facility'];
        $customer->acc_currency= $request['acc_currency'];
        $customer->acc_pin_number= $request['acc_pin_number'];
        $customer->acc_your3_d_security= $request['acc_your3_d_security'];
        $customer->acc_type= $request['acc_type'];
        $customer->acc_term_deposit= $request['acc_term_deposit'];
        $customer->house_number= $request['house_number'];
        $customer->street= $request['street'];
        $customer->save();
        

        $customer->BranchLocation()->associate($request['branch_location_id']);
        $customer->save();
        $customer->Province()->associate($request['province_id']);
        $customer->save();
        $customer->District()->associate($request['district_id']);
        $customer->save();
        $customer->Commune()->associate($request['commune_id']);
        $customer->save();
        $customer->Village()->associate($request['village_id']);
        $customer->save();

        $customers= Customer::paginate(15);
        return redirect()->route('dashboard-customer',[$customers]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        
        $provinceArray= array_pluck(Province::all(),'name','id');
        $districtArray= array_pluck(District::all(),'name','id');
        $communeArray= array_pluck(Commune::all(),'name','id');
        $villageArray = array_pluck(Village::all(),'name','id');
        $branchArray = array_pluck(BranchLocation::all(),'name','id');

        return view('admin.customer._form',compact('provinceArray','districtArray','communeArray','villageArray','customer','branchArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $file ='';
        if($request->hasFile('identity_document')){
            $file = $request->file('identity_document');
            $filename = 'identity_document-' . time() . '.' . $file->getClientOriginalExtension();
            $customer->identity_document = $file->storeAs('identity_document', $filename);
        }
        
        $customer->title = $request['title'];
        $customer->family_name= $request['family_name'];
        $customer->middle_name= $request['middle_name'];
        $customer->given_name= $request['given_name'];
        $customer->dob= $request['dob'];
        $customer->pob= $request['pob'];        
        $customer->identity_number= $request['identity_number'];
        $customer->passport_issued_country= $request['passport_issued_country'];
        $customer->issued_date= $request['issued_date'];
        $customer->expired_date= $request['expired_date'];
        $customer->email= $request['email'];
        $customer->phone= $request['phone'];
        $customer->why_open_account= $request['why_open_account'];
        $customer->know_by= $request['know_by'];
        $customer->professional_situation= $request['professional_situation'];
        $customer->position= $request['position'];
        $customer->company_name = $request['company_name'];
        $customer->business_type= $request['business_type'];
        $customer->source_of_income= $request['source_of_income'];
        $customer->monthly_income= $request['monthly_income'];
        $customer->main_nationality= $request['main_nationality'];
        $customer->second_nationality= $request['second_nationality'];
        $customer->is_us_person = $request['is_us_person'];
        $customer->cif= $request['cif'];
        $customer->reference_code= $request['reference_code'];
        $customer->acc_facility = $request['acc_facility'];
        $customer->acc_currency= $request['acc_currency'];
        $customer->acc_pin_number= $request['acc_pin_number'];
        $customer->acc_your3_d_security= $request['acc_your3_d_security'];
        $customer->acc_type= $request['acc_type'];
        $customer->acc_term_deposit= $request['acc_term_deposit'];
        $customer->house_number= $request['house_number'];
        $customer->street= $request['street'];
        $customer->save();
        

        $customer->BranchLocation()->associate($request['branch_location_id']);
        $customer->save();
        $customer->Province()->associate($request['province_id']);
        $customer->save();
        $customer->District()->associate($request['district_id']);
        $customer->save();
        $customer->Commune()->associate($request['commune_id']);
        $customer->save();
        $customer->Village()->associate($request['village_id']);
        $customer->save();

        $customers= Customer::paginate(15);
        return redirect()->route('dashboard-customer',[$customers]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if($customer->delete()){
            return 'yes';
        }else{
            return 'No';
        }
    }

    public function createAccount(Request $request)
    {
        $account = $request['saving_account'];
        $countryArray = array_pluck(Country::all(),'name', 'id');
        $provincesArray= array_pluck(Province::all(),'name','id');
        $districtArray= array_pluck(District::all(),'name','id');
        $communeArray= array_pluck(Commune::all(),'name','id');
        $villageArray = array_pluck(Village::all(),'name','id');
        $branchArray = array_pluck(BranchLocation::all(),'name','id');
        return view('account.form',compact('provincesArray','districtArray','communeArray','villageArray','account','countryArray'));
    }

    public function frontStore(Request $request)
    {

        $customer = new Customer();
        $file = $request->file('identity_document');
        $filename = 'identity_document-' . time() . '.' . $file->getClientOriginalExtension();
        $customer->title = $request['title'];
        $customer->family_name= $request['family_name'];
        $customer->middle_name= $request['middle_name'];
        $customer->given_name= $request['given_name'];
        $customer->dob= $request['dob'];
        $customer->pob= $request['pob'];
        $customer->identity_document = $file->storeAs('identity_document', $filename);
        $customer->identity_number= $request['identity_number'];
        $customer->passport_issued_country= $request['passport_issued_country'];
        $customer->issued_date= $request['issued_date'];
        $customer->expired_date= $request['expired_date'];
        $customer->email= $request['email'];
        $customer->phone= $request['phone'];
        $customer->why_open_account= $request['why_open_account'];
        $customer->know_by= $request['know_by'];
        $customer->professional_situation= $request['professional_situation'];
        $customer->position= $request['position'];
        $customer->company_name = $request['company_name'];
        $customer->business_type= $request['business_type'];
        $customer->source_of_income= $request['source_of_income'];
        $customer->monthly_income= $request['monthly_income'];
        $customer->main_nationality= $request['main_nationality'];
        $customer->second_nationality= $request['second_nationality'];
        $customer->is_us_person = $request['is_us_person'];
        $customer->cif= 'No';
        $customer->reference_code= 'None';
        $customer->acc_facility = 'None';
        $customer->acc_currency= $request['acc_currency'];
        $customer->acc_pin_number= 'None';
        $customer->acc_your3_d_security= 'None';
        $customer->acc_type= $request['account'];
        $customer->acc_term_deposit= 'None';
        $customer->house_number= $request['house_number'];
        $customer->street= $request['street'];
        $customer->account_code=str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $customer->save();
        

        $customer->BranchLocation()->associate($request['branch_location_id']);
        $customer->save();
        $customer->Province()->associate($request['province_id']);
        $customer->save();
        $customer->District()->associate($request['district_id']);
        $customer->save();
        $customer->Commune()->associate($request['commune_id']);
        $customer->save();
        $customer->Village()->associate($request['village_id']);
        $customer->save();
        

        $filename= $request['title'].' '.$request['family_name']. ' ' .$request['given_name'].$request['identity_number'].'.txt';
        Storage::put('document/'.$filename,$customer);

        // $customers= Customer::paginate(15);
        // return redirect()->route('dashboard-customer',[$customers]);
        return redirect()->route('account-created-page',[$customer]);
    }

    public function showAccount(Customer $account)
    {
        return $account;
    }

    public function searchAccount(Request $request)
    {
        $customer = Customer::where('account_code',$request->input('search'))->first();
        if($customer){
            $provinceArray= array_pluck(Province::all(),'name','id');
            $districtArray= array_pluck(District::all(),'name','id');
            $communeArray= array_pluck(Commune::all(),'name','id');
            $villageArray = array_pluck(Village::all(),'name','id');
            $branchArray = array_pluck(BranchLocation::all(),'name','id');

            return view('admin.customer._form',compact('provinceArray','districtArray','communeArray','villageArray','customer','branchArray'));
        }else{
            return 'No found';
        }
    }
 
    public function accountCreated(Customer $customer)
    {
        return view('account.created-page',compact('customer'));
    }

    public function identifyCheck($value='')
    {
        $customer = Customer::where('identity_number',(int)$value)->first();
        if($customer){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function identifyEmail($value='')
    {
        $customer = Customer::where('email',$value)->first();
        if($customer){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function identifyPhone($value='')
    {
        $customer = Customer::where('phone',$value)->first();
        if($customer){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function dobCheck($value='')
    {
        $arge = Carbon::parse($value)->age;
        return $arge;
    }

    public function provinceDistrictGet($value='')
    {
        $districtArray = District::where('province_id',(int)$value)->get();
        return $districtArray;
    }

    public function provinceCommuneGet($value='')
    {
        $communes = Commune::where('district_id',(int)$value)->get();
        return $communes;
    }

    public function provinceVilageGet($value='')
    {
        $villages = Village::where('commune_id',(int)$value)->get();
        return $villages;
    }
}
