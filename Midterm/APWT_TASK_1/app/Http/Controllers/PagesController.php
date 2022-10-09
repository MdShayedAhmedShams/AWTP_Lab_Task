<?php

namespace App\Http\Controllers;

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

}
