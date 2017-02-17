<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonconformitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonconformities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ncnform_nonconformity', function (Blueprint $table) {
            $table->integer('ncnform_id')->unsigned();
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')->onDelete('cascade');
            $table->integer('nonconformity_id')->unsigned();
            $table->foreign('nonconformity_id')->references('id')->on('nonconformities')->onDelete('cascade');
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
        Schema::dropIfExists('ncnform_nonconformity');
        Schema::dropIfExists('nonconformities');
    }
}
