<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pphases', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->uuid('parent_id')->nullable(); // Referenz zu Projekt
            $table->uuid('nextphase_id')->nullable(); // Referenz zu Projekt
            $table->uuid('lastphase_id')->nullable(); // Referenz zu Projekt
        });

        Schema::table('pphases', function (Blueprint $table) 
        {
            $table->foreign('parent_id')
            ->references('id')->on('pphases')
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
        Schema::dropIfExists('pphases');
    }
}
