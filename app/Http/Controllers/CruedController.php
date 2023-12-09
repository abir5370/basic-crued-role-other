<?php

namespace App\Http\Controllers;

use App\Models\Crued;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class CruedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crued = Crued::all();
        return view('crued.index',[
            'crueds'=>$crued
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crued.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:6|max:20',
            'email'=>'required|email|unique:crueds',
            'number' => 'required|min:8|max:20',
            'password' => ['required','confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(3)],
            'password_confirmation'=>'required',
            'photo'=> [
                File::image()
                    ->types(['png', 'jpg', 'jpeg'])
                    ->min(4)
                    ->max(3024)
            ],
             // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->file('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/crued/'), $imageName);
        }
        else {
            $imageName = null; // Only set to null if no photo is provided
        };
        Crued::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'password'=>bcrypt($request->password),
            'photo' => $imageName,
        ]);
        return back()->withSuccess('inserted!');
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
    public function edit(Crued $crued)
    {
        // $crued = Crued::find($id); this optional code

        return view('crued.edit',[
            'crued'=>$crued
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string|min:6|max:20',
            'email'=>'required|email|unique:crueds,email,'.$id,
            'number' => 'required|min:8|max:20',
            
            'photo'=> [
                File::image()
                    ->types(['png', 'jpg', 'jpeg'])
                    ->min(4)
                    ->max(3024)
            ],
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $crued = Crued::findOrFail($id);
        
        if($request->password == ''){
            if($request->photo == ''){
                $crued->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'number'=>$request->number,
                ]);
                return back();
            }else{
                if($crued->photo){
                    if(file_exists('uploads/crued/'.$crued->photo)){
                        unlink(public_path('uploads/crued/'.$crued->photo));  
                    }
                }
                if ($request->file('photo')) {
                    $image = $request->file('photo');
                    $imageName = time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('/uploads/crued/'), $imageName);
                }
                
                $crued->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'number'=>$request->number,
                    'photo' => $imageName,
                ]);
                return back()->withSuccess('inserted!');
            }
        }else{
            $request->validate([
                'old_password'=>'required',
                'password' => ['required','confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(3)],
                'password_confirmation'=>'required',
            ]);
            if($request->photo == ''){
                if(Hash::check($request->old_password,$crued->password)){
                    $crued->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'number'=>$request->number,
                        'password'=>bcrypt($request->password)
                    ]);
                    return redirect()->route('crued.index')->withSuccess('updated!');
                }else{
                    return back()->withErrors(['old_password' => 'Incorrect old password']); 
                }
            }else{
                if(file_exists('uploads/crued/'.$crued->photo)){
                    unlink(public_path('uploads/crued/'.$crued->photo));  
                }
                $image = $request->file('photo');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/uploads/crued/'), $imageName);
                $crued->update(['photo' => $imageName]);
                return redirect()->route('crued.index')->withSuccess('updated!');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crued $crued)
    {
        // $crued = Crued::find($id); or (this process find spacific id)
        if($crued->photo){
            if(file_exists(public_path('uploads/crued/'.$crued->photo))){
                unlink(public_path('uploads/crued/'.$crued->photo));
            }
        }
        $crued->delete();
        return back()->with('success','deleted');
        
    }
}
