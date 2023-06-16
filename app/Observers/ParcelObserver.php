<?php

namespace App\Observers;

use App\Parcel;
use App\ParcelLog;
use App\Status;

class ParcelObserver
{

    public function creating(Parcel $parcel)
    {

        if( auth()->user()->role_id == 5 ) $parcel->sender_id = auth()->user()->id;

        $pickupPendingStatus = Status::where('name', 'like', 'Pickup Pending')->first();

        if( $pickupPendingStatus ) $parcel->status = $pickupPendingStatus->name;


        // Pricing
        $pricings = auth()->user()->pricings;
        
        if( $pricings )
        {

            $parcel_pricing = $pricings->where('zone_id', $parcel->area->zone_id)->where('weight_id', $parcel->weight_id)->first();
            
            if( $parcel_pricing )
            {

                $parcel->charge = $parcel_pricing->price;

                $parcel->cod = $parcel->cash_to_collect < $parcel_pricing->cod_above ? 0 : ceil( $parcel->cash_to_collect * $parcel_pricing->cod_percentage / 100 );

                $parcel->payment = $parcel->cash_to_collect - $parcel->charge - $parcel->cod;

            }
            

        }
        // END: Pricing

    }

    /**
     * Handle the parcel "created" event.
     *
     * @param  \App\Parcel  $parcel
     * @return void
     */
    public function created(Parcel $parcel)
    {
        
        ParcelLog::create([
            'status' => $parcel->status,
            'log' => 'Created',
            'parcel_id' => $parcel->id,
            'created_by' => auth()->user()->id,
        ]);

    }

    /**
     * Handle the parcel "updated" event.
     *
     * @param  \App\Parcel  $parcel
     * @return void
     */
    public function updated(Parcel $parcel)
    {
        ParcelLog::create([
            'status' => $parcel->status,
            'log' => 'Updated',
            'parcel_id' => $parcel->id,
            'created_by' => auth()->user()->id,
        ]);
    }

    /**
     * Handle the parcel "deleted" event.
     *
     * @param  \App\Parcel  $parcel
     * @return void
     */
    public function deleted(Parcel $parcel)
    {
        //
    }

    /**
     * Handle the parcel "restored" event.
     *
     * @param  \App\Parcel  $parcel
     * @return void
     */
    public function restored(Parcel $parcel)
    {
        //
    }

    /**
     * Handle the parcel "force deleted" event.
     *
     * @param  \App\Parcel  $parcel
     * @return void
     */
    public function forceDeleted(Parcel $parcel)
    {
        //
    }
}
