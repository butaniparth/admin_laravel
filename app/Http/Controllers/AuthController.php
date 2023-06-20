<?php

namespace App\Http\Controllers;
use App\Notifications\admin_laravel;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{


    public function register(){ 
        return view ('auth.register');

    }

    public function registerpost(Request $request){
            //   dd($request->all());  //value check ok
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:2',
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
                
            return back()->with('success' ,'Register Successfully !!!!!');

                // return redirect('/home');
                
                
            // login Usre here

            // if($request->only('email','password')){
            //     return redirect('home');
         
    }

    public function login(){
        return view('auth.login1');   

    }

    public function loginpost(Request $request){

        $credetails =[

            'email' => $request->email,
            'password' => $request->password,
            
        ];

        // $request->session()->put('email',$request->email);
        //  return redirect('/home');
       
        if(Auth::attempt($credetails)){

            return redirect('/home')->with('success' ,'Login Successfully !!!!!');

        }
        return back()->with('error' ,'Email or Password Not Valid !!!!');

    }

    // public function home(){
    //     return view('home1');
    // }

    // public function logout(){
        
    //     Auth::logout();
    //     Session::flush();
    //     return redirect()->route('login');
    // }

    public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect('login')->with('success', 'You have been logged out.');
}

}

    
