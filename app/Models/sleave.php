<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sleave extends Model
{
    protected $fillable = [
        'hrs_id','startdate','enddate','daystaken','certificate'
    ];

    public function hrs()
    {
        return $this->belongsTo(Hrs::class);
    }   
}
