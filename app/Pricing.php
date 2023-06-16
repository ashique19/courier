<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricing';
    
    protected $fillable = [
        'id',
        'zone_id',
        'weight_id',
        'price',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
}
