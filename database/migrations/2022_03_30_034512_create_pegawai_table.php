<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('unit');
            $table->string('nik');
            $table->string('nrk');
            $table->string('password');
            $table->enum('gender',['Laki laki','Perempuan']);
            $table->string('posisi');
            $table->string('unitkerja');
            $table->string('formasi');
            $table->string('tpunit');
            $table->string('tpposisi');
            $table->string('stpegawai');
            $table->string('grup');
            $table->string('rank');
            $table->string('level');
            $table->string('pendidikan');
            $table->date('tmt');
            $table->date('masakerja');
            $table->date('tanggallahir');
            $table->string('str')->nullable();
            $table->date('terbitstr')->nullable();
            $table->date('akhirstr')->nullable();
            $table->string('sip')->nullable();
            $table->date('terbitsip')->nullable();
            $table->date('akhirsip')->nullable();
            $table->string('bpjs_kes')->nullable();
            $table->string('bpjs_ket')->nullable();
            $table->string('npwp')->nullable();
            $table->string('norek')->nullable();
            $table->string('stnikah');
            $table->string('anak');
            $table->text('alamat');
            $table->string('kel');
            $table->string('kec');
            $table->string('kota');
            $table->string('prov');
            $table->string('email')->unique();
            $table->string('notelp');
            $table->string('photo')->nullable();
            $table->integer('shift')->nullable();
            $table->integer('rsid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
