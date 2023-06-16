<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelLog extends Model
{
    protected $table = 'parcel_logs';
    
    protected $fillable = [
        'id',
        'status',
        'log',
        'parcel_id',
        'created_by',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
}
