<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->timestamps();
            //$table->morphs('comment');
            $table->smallInteger('lbversion'); // lb-versionsnummer (1-999)
            $table->string('aenderungsumfang',20)->nullable();
            $table->Text('aenderungsbeschreibung')->nullable();
            $table->longText('kommentar')->nullable();
            
            $table->uuid('commentable_id');
            $table->string('commentable_type');
            //commentable_id - integer
            //commentable_type - string
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
