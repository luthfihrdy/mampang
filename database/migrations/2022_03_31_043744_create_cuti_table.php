<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->integer('nrk');
            $table->integer('shift_id');
            $table->date('cuti_mulai');
            $table->date('cuti_selesai');
            $table->integer('jcuti');
            $table->integer('cuti_mplid');
            $table->text('cuti_alasan');
            $table->integer('nrkpengganti');
            $table->integer('cuti_plicode');
            $table->integer('cuti_dscode');
            $table->enum('status_kasatpel',['Waiting','Approved', 'Rejected'])->default('Waiting');
            $table->enum('status_kasubag',['Waiting','Approved', 'Rejected'])->default('Waiting');
            $table->enum('status_kapus',['Waiting','Approved', 'Rejected'])->default('Waiting');
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
        Schema::dropIfExists('cuti');
    }
}
