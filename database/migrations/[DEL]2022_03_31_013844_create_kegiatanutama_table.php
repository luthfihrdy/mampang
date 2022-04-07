<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanutamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatanutama', function (Blueprint $table) {
            $table->id();
            $table->integer('nrk');
            $table->integer('act_id');
            $table->date('keg_date');
            $table->time('keg_jammulai');
            $table->time('keg_jamselesai');
            $table->integer('point_menit')->length(5);
            $table->text('keg_notes')->nullable;
            $table->integer('keg_volume')->nullable;
            $table->integer('cacode');
            $table->integer('dscode');
            $table->integer('totalunit')->nullable;
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
        Schema::dropIfExists('kegiatanutama');
    }
}
