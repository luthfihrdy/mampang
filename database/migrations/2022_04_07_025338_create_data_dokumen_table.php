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
            $table->integer('users_id')->unique();
            $table->string('nik')->unique();
            $table->string('bpjs_kes')->nullable();
            $table->string('bpjs_ket')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_rek')->nullable();
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
