<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{
    public function index(){
        return view('home');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

    public function contactUs(){
        return view('contactUs');
    }

    public function ourTeams(){
        return view('ourTeams');
    }


    public function services(){
        $service = array();

        for($i=0; $i<10; $i++){
            $service = array(
                "name" => "Service " . ($i+1),
                "id" =>"00" . ($i+1)

            );
            $services[] = (object)$service;
        }


        return view('products.services')->with('services', $services);
    }

    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $this->validate($request, [
            'username'=>'required|min:5',
            'password'=>'required',
        ],);
        $user = User::where('username',$request->username)
        ->where('password',$request->password)
        ->first();

        if($user){
            return redirect()->back()->with('message', 'Login successful');
        }
        return $request;
    }

    public function register(){
        return view('registration');
    }

    public function registerSubmit(Request $request){
        $validate = $request->validate([
            'username'=>'required|min:5|max:20',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ],);

        $user = new  User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();

        return $request;
    }

}
