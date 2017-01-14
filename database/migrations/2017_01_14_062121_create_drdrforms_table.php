<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrdrformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drdrforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('drdr_no');
            $table->string('document_title');
            $table->string('revision_number');
            $table->text('reason_request');
            $table->string('attach_file');
            $table->timestamp('date_review');
            $table->timestamp('date_request');
            $table->timestamp('date_approved');
            $table->timestamp('date_mr');
            $table->timestamp('date_effective');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('drdrforms');
    }
}
