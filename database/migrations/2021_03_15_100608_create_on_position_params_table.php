<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateONPositionParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        /*
        Schema::create('on_position_params', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('on_position_params', function (Blueprint $table) {
            $table->string('on_position_id');
            $table->foreign('on_position_id')->references('id')->on('on_positions')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_position_params');
    }
}
