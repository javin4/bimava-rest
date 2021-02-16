<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_components', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->text('description',15)->nullable(); // Kennung
            //Gliederungen und Classifizierungen
           
            $table->string('Leistungsgliederung',15)->nullable();
            $table->string('Gewerk',15)->nullable();
            $table->string('freeClass',15)->nullable();
            //EHP
            $table->decimal('ehp_result',13, 4)->nullable();
            $table->decimal('ehp_override',13, 4)->nullable();
            $table->boolean('ehp_override_flag')->default(false);
            $table->decimal('ehp_computed',13, 4)->nullable();
        });
        Schema::table('p_components', function (Blueprint $table) {
            $table->uuid('bgl_id')->nullable();
            $table->foreign('bgl_id')
            ->references('id')->on('bgls')
            ->onDelete('set null');
            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_components');
    }
}
