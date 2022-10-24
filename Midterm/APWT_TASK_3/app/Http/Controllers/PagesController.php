<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;

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
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $this->validate($request, [
            'customername'=>'required|min:5',
            'password'=>'required',
        ],);

        $customer = Customer::where('customername',$request->customername)
        ->where('password',$request->password)
        ->first();

        if($customer){
            session()->put("type",'customer');
            session()->put("customername",$request->customername);
            return redirect()->route('cDashboard');
        }

        $admin = Admin::where('customername',$request->customername)
        ->where('password',$request->password)
        ->first();

        if($admin){
            session()->put("type",'admin');
            session()->put("customername",$request->customername);
            return redirect()->route('aDashboard');
        }

        return view('login')->with('message', 'Login failed. Incorrect customername or password');
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }

    public function register(){
        return view('registration');
    }

    public function registerSubmit(Request $request){
        $validate = $request->validate([
            'customername'=>'required|min:5|max:20',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required'
        ],);

        $customer = new  Customer();
        $customer->customername = $request->customername;
        $customer->password = $request->password;
        $customer->email = $request->email;
        $customer->save();
        session()->put('message', 'Registration successful. Please login to continue');
        return view('login');
    }
}
