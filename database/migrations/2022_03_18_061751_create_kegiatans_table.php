<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->date('tanggal_kegiatan');
            $table->string('jam_awal');
            $table->string('jam_akhir');
            $table->integer('point_menit')->length(5);
            $table->text('kegiatan');
            $table->enum('status',['Waiting','Approved', 'Rejected'])->default('Waiting');
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
        Schema::dropIfExists('kegiatans');
    }
}
