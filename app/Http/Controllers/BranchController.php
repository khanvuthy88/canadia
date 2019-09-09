<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BranchLocation;
use App\Imports\BranchImport;
use Maatwebsite\Excel\Facades\Excel;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = BranchLocation::paginate(15);
        return view('admin.branch.index',compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = new BranchLocation();
        return view('admin.branch._form',compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new BranchLocation();
        $branch->name = $request['branch_name'];
        $branch->longitude = $request['branch_longitude'];
        $branch->latitude = $request['branch_latitude'];
        $branch->address = $request['branch_location'];
        $branch->save();
        $branchs = BranchLocation::paginate(15);
        return redirect()->route('dashboard-branch',[$branchs]);
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
        $branch = BranchLocation::find($id);
        return view('admin.branch._form',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = BranchLocation::find($id);
        $branch->name = $request['branch_name'];
        $branch->longitude = $request['branch_longitude'];
        $branch->latitude = $request['branch_latitude'];
        $branch->address = $request['branch_location'];
        $branch->save();
        $branchs = BranchLocation::paginate(15);
        return redirect()->route('dashboard-branch',[$branchs]);
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

    public function import()
    {
        return view('admin.branch._import');
    }

    public function importBranch(Request $request)
    {
        $file = $request->file('import_url')->getRealPath();
        Excel::import(new BranchImport, $file);

        return back();
    }
}
