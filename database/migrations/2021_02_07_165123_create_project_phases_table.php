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
        
        });

        Schema::table('pphases', function (Blueprint $table) {
            $table->foreign('parent_id')
            ->references('id')->on('pphases')
            ->onDelete('cascade');
        });
/*
        Schema::table('pphases', function (Blueprint $table) 
        {
            $table->uuid('project_id')->nullable(); // Referenz zu Projekt
            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onDelete('cascade');
        });*/

        Schema::table('projects', function (Blueprint $table) 
        {
            $table->uuid('pphase_id')->nullable(); // Referenz zu Projekt
            $table->foreign('pphase_id')
            ->references('id')->on('pphases')
            ->onDelete('cascade');
        });


/*
        Schema::table('pphases', function (Blueprint $table) 
        {
            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onDelete('cascade');
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
        Schema::dropIfExists('pphases');
    }
}
