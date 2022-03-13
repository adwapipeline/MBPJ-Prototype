<?php

use App\Models\pembayaran;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kutipans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pembayaran_id');
            $table->string('namaPembayar');
            $table->string('kaedahBayaran');
            $table->string('accountNo');
            $table->string('totalKutipan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kutipans');
    }
};
