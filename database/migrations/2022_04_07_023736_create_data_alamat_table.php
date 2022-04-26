<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_alamat', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unique();
            $table->string('no_telp');
            $table->text('alamat');
            $table->text('kelurahan');
            $table->text('kecamatan');
            $table->text('provinsi');
            $table->text('kota');
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
        Schema::dropIfExists('data_alamat');
    }
}
