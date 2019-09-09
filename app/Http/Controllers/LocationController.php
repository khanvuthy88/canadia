<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Province::paginate(15);
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Province $location)
    {
        return view('admin.location._form',compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Province();
        $location->code = $request['code'];
        $location->name = $request['name'];
        $location->save();

        $locations = Province::paginate(15);
        return redirect()->route('dashboard-location',[$locations]);
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
        $location = Province::find($id);
        return view('admin.location._form',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $location)
    {
        $location->code = $request['code'];
        $location->name = $request['name'];
        $location->save();
        $locations = Province::paginate(15);
        return redirect()->route('dashboard-location',[$locations]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $location)
    {
        if($location->delete()){
            return 'yes';
        }else{
            return 'no';
        }
    }
}
