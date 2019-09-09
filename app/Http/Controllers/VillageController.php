<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commune;
use App\Village;
class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = Village::paginate(15);
        return view('admin.village.index',compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Village $village)
    {
        $communeArray = array_pluck(Commune::all(),'name','id');
        return view('admin.village._form',compact('village','communeArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $village = new Village();
        $village->code = $request['code'];
        $village->name = $request['name'];
        $village->save();

        $village->Commune()->associate($request['commune_id']);
        $village->save();

        $villages= Village::paginate(15);
        return redirect()->route('dashboard-village',[$villages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        return view('admin.village.show',compact('village'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        $communeArray = array_pluck(Commune::all(),'name','id');
        return view('admin.village._form',compact('village','communeArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $village->name = $request['name'];
        $village->code = $request['code'];
        $village->save();

        $village->Commune()->associate($request['commune_id']);
        $village->save();

        $villages= Village::paginate(15);
        return redirect()->route('dashboard-village',[$villages]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        return 'yes';
        // if($village->delete()){
        //     return 'yes';
        // }else{
        //     return 'NO';
        // }
        // $village->delete();
        // $villages = Village::paginate(15);

        // return redirect()->route('dashboard-village',[$villages]);
    }
}
