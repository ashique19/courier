<?php

namespace App\Http\Controllers\PublicControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pages extends Controller
{
    

    public function homepage(Request $request){
    
        return view('public.pages.home');
    
    }
    

}
