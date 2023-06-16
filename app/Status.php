<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
}
