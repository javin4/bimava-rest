<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateONPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_positions', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->timestamps();
            $table->string('title',60)->nullable();
            $table->longText('text')->nullable();
            $table->string('eh',3)->nullable(); //-> Enum
            $table->string('postyp',4); //'lg', 'ulg', 'upos','gpos', 'fpos'
            $table->string('parent_id')->nullable();
           
        });

        Schema::table('on_positions', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('on_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_positions');
    }
}
