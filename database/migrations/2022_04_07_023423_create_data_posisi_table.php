<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPosisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_posisi', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unique();
            $table->text('jabatan');
            $table->text('unit_kerja');
            $table->text('formasi_jabatan');
            $table->text('jenis_jabatan');
            $table->text('status_pegawai');
            $table->text('rank');
            $table->text('group');
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
        Schema::dropIfExists('data_posisi');
    }
}
