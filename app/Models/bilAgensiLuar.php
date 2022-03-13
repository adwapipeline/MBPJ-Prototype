<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bilAgensiLuar extends Model
{
    use HasFactory;

    public $table = 'bil_agensi_luars';


    protected $fillable = [

        'tajuk',
        'jenisBilMajlis',
        'tarikh',
        'totalBayaran',

   ];
}
