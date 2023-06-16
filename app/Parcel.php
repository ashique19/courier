<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $table = 'parcels';
    
    protected $fillable = [
        'id',
        'sender_id',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
        'weight_id',
        'area_id',
        'cash_to_collect',
        'cash_collected',
        'charge',
        'cod',
        'payment',
        'status',
        'sender_note',
        'is_return',
        'parcel_id',
        'held_by',
        'created_by',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function sender(){
    
        return $this->belongsTo('\App\User', 'sender_id');
    
    }


    public function parcel(){
    
        return $this->belongsTo('\App\Parcel');
    
    }


    public function weight(){
    
        return $this->belongsTo('\App\Weight');
    
    }


    public function area(){
    
        return $this->belongsTo('\App\Area');
    
    }
    

    public function heldBy(){
    
        return $this->belongsTo('\App\User', 'held_by');
    
    }
    
    
    public function createdBy(){
    
        return $this->belongsTo('\App\User', 'created_by');
    
    }
    
    
    
}
