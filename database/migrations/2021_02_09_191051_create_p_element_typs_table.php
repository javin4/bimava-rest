<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePElementTypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_elementtyps', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->text('description',15)->nullable(); // Kennung
            $table->decimal('ehp_result',13, 4)->nullable();
            $table->decimal('ehp_override',13, 4)->nullable();
            $table->boolean('ehp_override_flag')->default(false);
            $table->decimal('ehp_computed',13, 4)->nullable();
        });

        Schema::create('p_elements', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->uuid('p_elementtyp_id')->nullable(); // Referenz zu Cost_Element
        });

        Schema::create('p_components', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->text('description',15)->nullable(); // Kennung
            //Gliederungen und Classifizierungen
            $table->string('Baugliederung',15)->nullable();
            $table->string('Leistungsgliederung',15)->nullable();
            $table->string('Gewerk',15)->nullable();
            $table->string('freeClass',15)->nullable();
            //EHP
            $table->decimal('ehp_result',13, 4)->nullable();
            $table->decimal('ehp_override',13, 4)->nullable();
            $table->boolean('ehp_override_flag')->default(false);
            $table->decimal('ehp_computed',13, 4)->nullable();
        });

        Schema::table('p_elements', function (Blueprint $table) {
            $table->foreign('p_elementtyp_id')
            ->references('id')->on('p_elementtyps')
            ->onDelete('set null');
        });

        //Relationtable elements_typs
        Schema::create('p_typ_components', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('p_elementyp_id');
            $table->uuid('p_component_id');
        });

        Schema::table('p_typ_components', function (Blueprint $table) {
            $table->integer('z')->nullable();
            $table->foreign('p_elementyp_id')
                  ->references('id')
                  ->on('p_elementtyps')->onDelete('cascade');

            $table->foreign('p_component_id')
                  ->references('id')
                  ->on('p_components')->onDelete('cascade');
        });

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_elementtyps');
        Schema::dropIfExists('p_elements');
        Schema::dropIfExists('p_components');
        Schema::dropIfExists('p_typ_components');
    }
}
