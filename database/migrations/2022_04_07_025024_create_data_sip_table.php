<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sip', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unique();
            $table->integer('sip_no')->nullable();
            $table->date('sip_terbit')->nullable();
            $table->date('sip_akhir')->nullable();
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
        Schema::dropIfExists('data_sip');
    }
}
