<?php

namespace App\Http\Controllers\Sender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Zone;
use App\Weight;

class Pricings extends Controller
{
    
    public function index()
    {

        $pricings = auth()->user()->pricings;

        $zones = Zone::all();

        $weights = Weight::all();
        
        return view('sender.pricing', compact('pricings', 'zones', 'weights') );

    }

}
