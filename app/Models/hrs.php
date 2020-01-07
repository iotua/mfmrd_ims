<?php

use App\Models;

use Illuminate\Database\Eloquent\Model;

class hrs extends Model
{
    protected $fillable = [
    'division',
    'fullname',
    'posttitle',
	'photolocation',
    'salarylevel',
    'cursalarylevel',
    'dateofappointment',
    'dataofbirth',
    'gender',
    'appointmenttype',
    'qualification',
    'program',
    'pfnumber',
    'incremendate',
    'datecurappointment',
    'homeisland',
    'age'
    ];

    

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function sleaves()
    {
        return $this->hasMany(Sleave::class);
    }

    public function cleaves()
    {
        return $this->hasMany(Cleave::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function travels()
    {
        return $this->hasMany(Travel::class);
    }

    public function leavebals()
    {
        return $this->hasMany(Travel::class);
    }
        
}
