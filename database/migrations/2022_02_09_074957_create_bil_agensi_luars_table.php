<?php

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
        Schema::create('bil_agensi_luars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tajuk');
            $table->string('jenisBilMajlis');
            $table->string('tarikh');
            $table->string('totalBayaran');
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
        Schema::dropIfExists('bil_agensi_luars');
    }
};
