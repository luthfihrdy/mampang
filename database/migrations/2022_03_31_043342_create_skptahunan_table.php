<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkptahunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skptahunan', function (Blueprint $table) {
            $table->id();
            $table->integer('nrk');
            $table->integer('act_id');
            $table->date('skp_date');
            $table->date('skp_tahun');
            $table->integer('skp_target');
            $table->integer('dscode');
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
        Schema::dropIfExists('skptahunan');
    }
}
