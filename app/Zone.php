<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zones';
    
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


    public function areas()
    {

        return $this->hasMany('\App\Area');

    }


    
    
}
