<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mrs extends Model
{
     protected $fillable = [       
    'date',
    'mailsubject',
    'letterdated',
    'sender',
    'department',
    'codenumber',
    'concernofficer',
    'letterurl',
    'action'
     ];
}
