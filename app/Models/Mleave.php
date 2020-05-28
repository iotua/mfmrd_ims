<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mleave extends Model
{
    
    protected $fillable = [
        'hrs_id','startdate','enddate','daystaken'
    ];

    public function hrs()
    {
        return $this->belongsTo(Hrs::class);
    }   
}


