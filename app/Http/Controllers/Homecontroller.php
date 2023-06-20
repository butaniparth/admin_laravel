<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fmodel;
use Illuminate\Support\Facades\DB;
use App\Notifications\admin_laravel;
use Illuminate\Notifications\Notifiable;


class Homecontroller extends Controller
{
    public function index(){
        return view('home1',[
            'form' => fmodel::get(),
            'count' => fmodel::count()
        ]);
        
    }

    public function create(){
        return view('create',[
            'countries' => fmodel::get(["name", "id"])
        ]);

    } 
    
    public function store(Request $request)
    {
    //    dd($request->all()); //value Check ok 

    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'number' => 'required',
        'images' => 'required|mimes:jpeg,jpg,png,gift|max:10000'
    ]);

        // Upload Images
    $imageName = time().'.'. $request->images->extension();
    $request->images->move(public_path('Imges'),$imageName);
    // dd($imageName);value Check ok

    $form = new fmodel;
    $form->images = $imageName;
    $form->name = $request->name;
    $form->email = $request->email;
    $form->number = $request->number;
    $form->country = $request->country;
    $form->state = $request->state;
    $form->city = $request->city;

    $form->save();

    return back()->withSuccess('Successfully Insert Data !!!!!');

    } 

    public function edit($id){
        // dd($id); Value Check ok

        $editform = fmodel::where('id',$id)->first();
        return view('fedit',['editform' => $editform]);
    

    }

    public function update(Request $request, $id){
        // dd($request->all()); value Check Ok
        // dd($id); Valu check ok


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'images' => 'nullable|mimes:jpeg,jpg,png,gift|max:10000'
        ]);
    
        $form = fmodel::where('id',$id)->first();
            //Update Upload Images

            if(isset($request->images)){
                $imageName = time().'.'. $request->images->extension();
                $request->images->move(public_path('Imges'),$imageName);
                $form->images = $imageName;
                
            }

        $form->name = $request->name;
        $form->email = $request->email;
        $form->number = $request->number;
        $form->country = $request->country;
        $form->state = $request->state;
        $form->city = $request->city;

       


    
        $form->save();
    
        return back()->withSuccess('Successfully Update Data !!!!!');

    }
    public function destroy($id){

        $deletform = fmodel::where('id',$id)->first();
        $deletform->delete();

        return back();

    }

