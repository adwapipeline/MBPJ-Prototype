<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyelenggaraan extends Model
{
    use HasFactory;

    public $table = 'penyelenggaraans';


    protected $fillable = [

        'jumlahBayaran',
        'bakiBayaran',


   ];
}
