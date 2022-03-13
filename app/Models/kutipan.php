<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kutipan extends Model
{
    use HasFactory;

    public $table = 'kutipans';

    protected $fillable = [
        'pembayaran_id',
         'namaPembayar',
         'kaedahBayaran',
         'accountNo',
         'totalKutipan',

    ];
}
