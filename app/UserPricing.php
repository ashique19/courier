<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPricing extends Model
{
    protected $table = 'user_pricing';
    
    protected $fillable = [
        'id',
        'user_id',
        'zone_id',
        'weight_id',
        'price',
        'cod_above',
        'cod_percentage',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function user(){
    
        return $this->belongsTo('\App\User');
    
    }
    

    public function zone(){
    
        return $this->belongsTo('\App\Zone');
    
    }
    

    public function weight(){
    
        return $this->belongsTo('\App\Weight');
    
    }
    
    
}
