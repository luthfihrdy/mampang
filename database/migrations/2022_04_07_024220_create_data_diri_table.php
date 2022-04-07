<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diri', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unique();
            $table->enum('gender',['Laki Laki','Perempuan']);
            $table->text('id_nip_nrp');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('status_nikah');
            $table->integer('anak');
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
        Schema::dropIfExists('data_diri');
    }
}
