<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lvs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);              // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->uuid('project_id')->nullable(); // Referenz zu Projekt
        });


        Schema::table('lvs', function (Blueprint $table) 
        {
            $table->foreign('project_id')
            ->references('id')->on('projects')
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
        Schema::dropIfExists('lvs');
    }
}
