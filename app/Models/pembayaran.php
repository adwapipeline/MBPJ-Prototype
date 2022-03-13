<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class pembayaran extends Model
{
    use HasFactory;

    public $table = 'pembayarans';


    protected $fillable = [

         'namaPembayar',
         'tarikhPembayaran',
         'kaedahPembayaran',
         'totalPembayaran',

    ];
}
