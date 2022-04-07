<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dokumen', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->integer('nik')->unique();
            $table->integer('bpks_kes')->nullable();
            $table->integer('bpjs_ket')->nullable();
            $table->integer('npwp')->nullable();
            $table->integer('no_rek')->nullable();
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
        Schema::dropIfExists('data_dokumen');
    }
}
