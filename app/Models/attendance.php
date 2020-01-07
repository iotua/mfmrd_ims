<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
    'hrs_id','month','absent','present'
    ];

    public function hrs()
         {
             return $this->belongsTo(Hrs::class);
         }     

}
