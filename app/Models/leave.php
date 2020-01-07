<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [       
        'startdate',
        'enddate',
        'daystaken',
        
        'hrs_id'      
         ];

         public function hrs()
         {
             return $this->belongsTo(Hrs::class);
         }     
}
