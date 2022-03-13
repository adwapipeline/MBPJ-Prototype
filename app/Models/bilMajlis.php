<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bilMajlis extends Model
{
    use HasFactory;

    public $table = 'bil_majlis';


    protected $fillable = [

        'tajuk',
        'jenisBilMajlis',
        'tarikh',
        'totalBayaran',

   ];
}
