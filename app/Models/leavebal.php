<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leavebal extends Model
{
    protected $fillable = [       
        'year', 'bal', 'hrs_id'      
         ];

         public function hrs()
         {
             return $this->belongsTo(Hrs::class);
         } 
}
