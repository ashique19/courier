<?php

namespace App\Observers;

use App\User;
use App\UserPricing;
use App\Pricing;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {

        $user = User::find( $user->id );

        if( $user->role_id == 5 )
        {

            $pricing = Pricing::all()->toArray();
            
            if( count( $pricing ) > 0 )
            {

                $userPricing = array_map(function($price) use ($user) { return 
                    [
                        'user_id' => $user->id,
                        'zone_id' => $price['zone_id'],
                        'weight_id' => $price['weight_id'],
                        'price' => $price['price'],
                        'cod_above' => env('COD_ABOVE'),
                        'cod_percentage' => env('COD_PERCENTAGE')
                    ]; 
                }, $pricing);

                \App\UserPricing::insert( $userPricing );

            }

        }

    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
