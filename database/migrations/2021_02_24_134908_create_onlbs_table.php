<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlbs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            
            //metadaten
            $table->dateTime('erstelltam');
            $table->string('dateiname',60); // todo
            $table->string('programmsystem',60);
            $table->string('programmversion',60);

            //LB-Kenndaten
            $table->string('bezeichnung',60);
            $table->string('herausgeber',100);  // todo
            $table->string('lbkennung',10);     
            $table->smallInteger('versionsnummer'); // lb-versionsnummer (1-999)
            $table->date('versionsdatum'); 
            $table->string('status',20); 
            $table->string('downloadurl',100)->nullable(); 
            $table->string('bezeichnungteilausgabe',60)->nullable(); 

            $table->longText('svb_vorbemerkung')->nullable();
            $table->longText('svb_kommentar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onlbs');
    }
}
