<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_lgs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('bezeichnung',60);
            $table->string('lg_nr',2);//'lg-Nummer' => 'regex:[A-Z0-9]*',
            $table->longText('vorbemerkung')->nullable();
        });

        Schema::table('on_lgs', function (Blueprint $table) {
            $table->uuid('onlb_id')->nullable();
            $table->foreign('onlb_id')
            ->references('id')->on('onlbs')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_lgs');
    }
}
