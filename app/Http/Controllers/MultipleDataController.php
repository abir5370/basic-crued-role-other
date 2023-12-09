<?php

namespace App\Http\Controllers;

use App\Models\MultiData;
use App\Models\MultiMultiple;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class MultipleDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multidata = MultiMultiple::all();
        $singleData = MultiData::all();
        // return response()->json($multidata);
        return view('multidata.index',[
            'multiples'=>$multidata, 
            'singles'=>$multidata, 
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('multidata.create',[
            'permissions'=>Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    single single column eksathe multiple insert kora.alada alade id hobe
        $selectedPermissions = $request->input('multidata');
        foreach($selectedPermissions as $select){
            MultiData::create([
                'name'=> $select
            ]);
        }
        return back();
    }

    //custom-method-create
    public function multiMultiple(Request $request){

         $request->validate([
            'name' => 'required|string',
            'includes' => 'nullable|array',
            'bed_type' => 'nullable|array',
            'facilities' => 'nullable|array',
        ]);

        // Implode the array values to create comma-separated strings
        $includes = implode(',', $request->input('includes', []));
        $bedType = implode(',', $request->input('bed_type', []));
        $facilities = implode(',', $request->input('facalities', []));
        
        
        // Create a new accommodation instance and fill it with the form data
        MultiMultiple::create([
            'name' => $request->input('name'),
            'includes' => $includes,
            'bed_type' => $bedType,
            'facilities' => $facilities,
        ]);
        return back()->withSuccess('data saved!');


        // other system multi-Data-Insert databse ee save with array system

            //Model ee use

    //         protected $casts = [
    //     'includes' => 'array',
    //     'bed_type' => 'array',
    //     'facilities' => 'array',
    //     ];

            // MultiMultiple::create([
            //     'name' => $request->input('name'),
            //     'includes' => $request->includes,
            //     'bed_type' => $request->bed_types,
            //     'facilities' => $request->facilities,
            // ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Delete($id){
        $multidata = MultiMultiple::find($id);
        $multidata->delete();
        return back();
    }
}
