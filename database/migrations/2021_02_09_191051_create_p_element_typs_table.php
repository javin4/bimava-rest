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
        Schema::create('p_element_typs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->text('description',15)->nullable(); // Kennung
        });

        Schema::create('p_elements', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->uuid('p_element_typ_id')->nullable(); // Referenz zu Cost_Element
        });

        Schema::create('p_components', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60);   // Bezeichnung
            $table->string('kennung',15); // Kennung
            $table->text('description',15)->nullable(); // Kennung
        });

        Schema::table('p_elements', function (Blueprint $table) {
            $table->foreign('p_element_typ_id')
            ->references('id')->on('p_element_typs')
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
        Schema::dropIfExists('p_element_typs');
        Schema::dropIfExists('p_elements');
        Schema::dropIfExists('p_components');
    }
}
