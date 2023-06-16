<?php

namespace App\Http\Controllers\PrivateControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboards extends Controller
{


    public function __construct()
    {

        if( ! auth()->user() ) return redirect()->route('login');

        if( auth()->user()->email_verified_at == null ) return redirect()->route('verification.notice');

    }

    
    public function index()
    {
        
        switch( auth()->user()->role_id )
        {

            case 2:
                return redirect()->action('PrivateControllers\Dashboards@admin');
                break;

            case 3:
                return redirect()->action('PrivateControllers\Dashboards@hub');
                break;

            case 4:
                return redirect()->action('PrivateControllers\Dashboards@groundTeam');
                break;

            case 5:
                return redirect()->action('PrivateControllers\Dashboards@sender');
                break;

        }
        

    }


    public function admin(){
    
        return view('admin.dashboard');
    
    }

    public function hub(){
    
        return view('hub.dashboard');
    
    }

    public function groundTeam(){
    
        return view('ground-team.dashboard');
    
    }

    public function sender(){
    
        return view('sender.dashboard');
    
    }
    

}
