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
            $table->varchar('nama');
            $table->varchar('unit');
            $table->varchar('nik');
            $table->varchar('nrk');
            $table->varchar('password');
            $table->enum('gender',['Laki laki','Perempuan']);
            $table->varchar('posisi');
            $table->varchar('unitkerja');
            $table->varchar('formasi');
            $table->varchar('tpunit');
            $table->varchar('tpposisi');
            $table->varchar('stpegawai');
            $table->varchar('grup');
            $table->varchar('rank');
            $table->varchar('level');
            $table->varchar('pendidikan');
            $table->date('tmt');
            $table->date('masakerja');
            $table->date('tanggallahir');
            $table->varchar('str')->nullable();
            $table->date('terbitstr')->nullable();
            $table->date('akhirstr')->nullable();
            $table->varchar('sip')->nullable();
            $table->date('terbitsip')->nullable();
            $table->date('akhirsip')->nullable();
            $table->varchar('bpjs_kes')->nullable();
            $table->varchar('bpjs_ket')->nullable();
            $table->varchar('npwp')->nullable();
            $table->varchar('norek')->nullable();
            $table->varchar('stnikah');
            $table->varchar('anak');
            $table->text('alamat');
            $table->varchar('kel');
            $table->varchar('kec');
            $table->varchar('kota');
            $table->varchar('prov');
            $table->varchar('email')->unique();
            $table->varchar('notelp');
            $table->varchar('photo')->nullable();
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
