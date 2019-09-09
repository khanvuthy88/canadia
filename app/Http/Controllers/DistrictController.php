<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Province;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::paginate(15);
        return view('admin.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(District $district)
    {
        $province_list = array_pluck(Province::all(),'name','id');
        return view('admin.district._form',compact('district','province_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $district = new District();
        $district->code = $request['code'];
        $district->name = $request['name'];
        $district->save();
        $district->Province()->associate($district);
        $district->save();
        $districts = District::paginate(15);
        return redirect()->route('dashboard-district',[$districts]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::find($id);
        $province_list = array_pluck(Province::all(),'name','id');
        return view('admin.district._form',compact('district','province_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $district->code = $request['code'];
        $district->name = $request['name'];
        $district->save();
        $district->Province()->associate($district);
        $district->save();
        $districts = District::paginate(15);
        return redirect()->route('dashboard-district',[$districts]);
    }

    public function remove(District $district)
    {
        return $district;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
