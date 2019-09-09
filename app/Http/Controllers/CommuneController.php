<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commune;
use App\District;
class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::paginate(15);
        return view('admin.commune.index',compact('communes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Commune $commune)
    {
        $district_list = array_pluck(District::all(),'name','id');
        return view('admin.commune._form',compact('commune','district_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commune = new Commune();
        $commune->code = $request['code'];
        $commune->name = $request['name'];
        $commune->save();

        $commune->District()->associate($request['district_id']);
        $commune->save();

        $communes = Commune::paginate(15);
        return redirect()->route('dashboard-commune',[$communes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        return view('admin.commune.show',compact('commune'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        $district_list = array_pluck(District::all(),'name','id');
        return view('admin.commune._form',compact('commune','district_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commune $commune)
    {
        $commune->code = $request['code'];
        $commune->name = $request['name'];
        $commune->save();

        $commune->District()->associate($commune);
        $commune->save();

        $communes = Commune::paginate(15);
        return redirect()->route('dashboard-commune',[$communes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commune = Commune::find($id);
        $commune->delete();
        $communes = Commune::paginate(15);

        return view('admin.commune.index',compact('communes'));
    }
}
