<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = [
    'hrs_id','date','day','work_rest','punch_in','punch_out','remark'
    ];

    public function hrs()
         {
             return $this->belongsTo(Hrs::class);
         }     

}
