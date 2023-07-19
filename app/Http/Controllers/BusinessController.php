<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBusinessRequest;
use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $business = Business::where('id', 1)->firstOrFail();
        return view('admin.business.index', compact('business'));
    }

    public function update(UpdateBusinessRequest $request, Business $business)
    {

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            
        }

        $business->update($request->all()+[
            'logo'=>$image_name,
        ]);
        return redirect()->route('business.index'); 
    }
    // public function index(){
    //     $business = Business::where('id', 1)->firstOrFail();
    //     return view('admin.business.index', compact('business'));
    // }
    // public function update(UpdateRequest $request, Business $business)
    // {
    //     $business->my_update($request);
    //     return redirect()->route('business.index')->with('toast_success', '¡Información actualizada con éxito!');
    // }
}
