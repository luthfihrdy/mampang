<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataStrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_str', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->unique();
            $table->integer('str_no')->nullable();
            $table->date('str_terbit')->nullable();
            $table->date('str_akhir')->nullable();
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
        Schema::dropIfExists('data_str');
    }
}
