<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('param_values', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('value',10);
            $table->string('valuetype',10)->nullable();
            $table->string('unit',4)->nullable();
            $table->uuid('param_id')->nullable();
        });

        Schema::table('param_values', function (Blueprint $table) {
            $table->foreign('param_id')->references('id')->on('params')->onDelete('cascade');
        });
        Schema::create('on_position_paramsvalue', function (Blueprint $table) {

            $table->uuid('paramsvalue_id');
            $table->foreign('param_id')->references('id')->on('param_values')->onDelete('cascade');

            $table->string('on_position_id');
            $table->foreign('param_id')->references('id')->on('on_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('param_values');
    }
}
