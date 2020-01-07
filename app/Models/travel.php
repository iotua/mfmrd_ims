<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class travel extends Model
{
    protected $fillable = [
    'hrs_id','startdate','enddate','purpose','destination','daystaken'
    ];

    public function hrs()
    {
        return $this->belongsTo(Hrs::class);
    }  
}
