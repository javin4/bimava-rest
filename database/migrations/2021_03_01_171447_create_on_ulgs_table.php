<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnUlgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_ulgs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('ulg_part_nr',2);//'lg-Nummer' => 'regex:[A-Z0-9]*',
            $table->string('ulg_nr',4);//'lg-Nummer' => 'regex:[A-Z0-9]*',
            $table->string('bezeichnung',60);
        });

        Schema::table('on_ulgs', function (Blueprint $table) {
            $table->uuid('onlg_id')->nullable();
            $table->foreign('onlg_id')
            ->references('id')->on('on_lgs')
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
        Schema::dropIfExists('on_ulgs');
    }
}
