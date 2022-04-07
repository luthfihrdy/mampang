<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('act_id');
            $table->date('keg_date');
            $table->time('keg_jammulai');
            $table->time('keg_jamselesai');
            $table->integer('point_menit')->length(5);
            $table->text('keg_notes')->nullable;
            $table->integer('keg_volume')->nullable;
            $table->enum('cacode',['UTAMA','UMUM']);
            $table->integer('status');
            $table->integer('totalunit')->nullable;
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
        Schema::dropIfExists('kegiatan');
    }
}
