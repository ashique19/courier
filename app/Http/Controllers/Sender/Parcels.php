<?php

namespace App\Http\Controllers\Sender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Weight;
use App\Zone;
use App\Parcel;

class Parcels extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $parcels = Parcel::latest()->paginate(30);

        return view('sender.parcels.index', compact('parcels') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $weights = Weight::all()->pluck('name', 'id');

        $zones = Zone::with('areas')->get();
        
        return view('sender.parcels.create', compact('weights', 'zones') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        
        $this->validate($request, [
            "receiver_name" => 'required',
            "receiver_address" => 'required',
            "receiver_phone" => 'digits:11',
            "area_id" => 'required|integer',
            "cash_to_collect" => 'required|integer',
            "weight_id" => 'required|integer',
            "agree_terms" => 'required',
        ]);

        

        $parcel = Parcel::create( $request->only([
            "receiver_name",
            "receiver_address",
            "receiver_phone",
            "address",
            "area_id",
            "cash_to_collect",
            "weight_id",
            "agree_terms",
        ]) );
        
        return back()->withErrors('Parcel has been saved.');
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function upload(Request $request)
    {

        if( $request->isMethod('get') ) return view('sender.parcels.upload');

        if( $request->isMethod('post') )
        {

            $this->validate($request, [ 'parcel_excel' => 'required' ]);

            if( $request->hasFile('parcel_excel') )
            {

                $file = $request->file('parcel_excel');

                $ext = $file->getClientOriginalExtension();
                
                $size = $file->getClientSize();

                $temp_path = public_path('temp');

                $temp_file_name = 'excel_'.auth()->user()->id.'_'.date('Y-m-d--H-i-s.').$ext;
                
                if( $ext != 'csv' ) return back()->withErrors('Only csv file is allowed.');

                if( $size > 1000000 ) return back()->withErrors('File size must be less than 1MB');

                $file->move( $temp_path, $temp_file_name );

                $csv = array_map('str_getcsv', file( $temp_path.'/'.$temp_file_name ));
                array_walk($csv, function(&$a) use ($csv) {

                    $a = array_combine($csv[0], $a);
                    
                });

                $header = array_keys(array_shift($csv));
                $data = $csv;

                \Storage::delete( $temp_path.'/'.$temp_file_name );

                return view('sender.parcels.upload-preview', compact('data') );

                // return (array) $data;

            }

            return back()->withErrors('csv file was not found');

        }

    }


    public function insert(Request $request)
    {

        $this->validate($request,[
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'receiver_address' => 'required',
            'area_id' => 'required',
            'weight_id' => 'required',
            'cash' => 'required',
            'note' => 'required',
        ]);

        $inputs = $request->only([
            'receiver_name',
            'receiver_phone',
            'receiver_address',
            'area_id',
            'weight_id',
            'cash',
            'note'
        ]);

        // return $inputs;
        // return range(0, count($inputs['receiver_name']) -1 );

        $data = [];

        $status = \App\Status::where('name', 'like', 'PICKUP PENDING')->first()->name;

        for( $i = 0; $i < count( $inputs['receiver_name'] ); $i++ )
        {

            $charge = \App\UserPricing::where('user_id', auth()->user()->id)->where('zone_id', \App\Area::find((int) $inputs['area_id'][$i])->zone_id )->where('weight_id', (int) $inputs['weight_id'][$i])->first();

            $data[] = [
                'sender_id' => auth()->user()->id,
                'receiver_name' => (string) $inputs['receiver_name'][$i],
                'receiver_phone' => "0". (int) $inputs['receiver_phone'][$i],
                'receiver_address' => (string) $inputs['receiver_address'][$i],
                'area_id' => (int) $inputs['area_id'][$i],
                'weight_id' => (int) $inputs['weight_id'][$i],
                'cash_to_collect' => (int) $inputs['cash'][$i],
                'sender_note' => (string) $inputs['note'][$i],
                'status' => $status,
                'held_by' => auth()->user()->id,
                'created_by' => auth()->user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'charge' => $charge->price,
                // 'cod' => (int) $inputs['cash'][$i] > $charge->cod_above ? ceil( (int) $inputs['cash'][$i] * $charge->cod_percentage / 100 ) : 0
            ];

        }

        $saved_parcels = Parcel::insert($data);

        return redirect()->action('Sender\Parcels@index')->withErrors( "Parcels have been saved.");



    }
}
