<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditTrail extends Model
{
    use HasFactory;

    public $table = 'audit_trails';


    protected $fillable = [
        'activity',
         'date',
         'user',

    ];
}
