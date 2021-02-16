<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBglsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bgls', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            $table->string('name',60); // bezeichnung
            $table->string('kennung',15)->unique(); // bezeichnung
            $table->uuid('parent_id')->nullable();
        });

        Schema::table('bgls', function (Blueprint $table) 
        {
            $table->foreign('parent_id')
            ->references('id')->on('bgls')
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
        Schema::dropIfExists('bgls');
    }
}
