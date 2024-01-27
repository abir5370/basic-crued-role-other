<?php

namespace App\Http\Controllers;

use App\Models\Multistep;
use App\Models\MultistepSame;
use Illuminate\Http\Request;

class MultiformController extends Controller
{
    public function create(){
        return view('multiform.create');
    }
    
    public function store(Request $request){
        Multistep::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return back();
    }

    public function createTwo(){
        return view('multiform.two-create');
    }
    public function storeTwo(Request $request){
        $names = implode(',', $request->name);
    
        MultistepSame::create([
            'name' => $names,
        ]);
    
        return back();
    }
}
