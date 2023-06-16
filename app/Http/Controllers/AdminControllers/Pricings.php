<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Zone;
use App\Weight;
use App\Pricing;

class Pricings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $zones      = Zone::all();
        $weights    = Weight::all();
        $pricings   = Pricing::all();
        
        return view('admin.pricing.index', compact('zones', 'weights', 'pricings') );

    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $zone_ids = $request->input('zone_id');
        $weight_ids = $request->input('weight_id');
        $price = $request->input('price');

        if( count( $zone_ids ) != count( $weight_ids ) || count( $zone_ids ) != count( $price ) ) return back()->withErrors('Unexpected data found.');
        
        $pricing = [];

        for( $i = 0; $i < count( $zone_ids ); $i++ )
        {

            $pricing[] = [
                'zone_id' => (int) $zone_ids[$i],
                'weight_id' => (int) $weight_ids[$i],
                'price' => (int) $price[$i]
            ];

        }

        Pricing::where('id', '>', 0)->delete();

        Pricing::insert( $pricing );

        return back()->withErrors('Price has been updated successfully.');

    }
}
