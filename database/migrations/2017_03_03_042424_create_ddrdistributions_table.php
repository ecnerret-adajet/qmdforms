<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdrdistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddrdistributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ddrdistribution_ddrform', function (Blueprint $table){
            $table->integer('ddrdistribution_id')->unsigned();
            $table->foreign('ddrdistribution_id')->references('id')->on('ddrdistributions')->onDelete('cascade');
            $table->integer('ddrform_id')->unsigned();
            $table->foreign('ddrform_id')->references('id')->on('ddrforms')->onDelete('cascade');
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
        Schema::dropIfExists('ddrdistribution_ddrform');
        Schema::dropIfExists('ddrdistributions');
    }
}
