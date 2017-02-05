<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrdrreviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drdrreviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('drdrform_id')->unsigned();

            $table->string('name');
            $table->string('position');
            
            $table->text('remarks');
            $table->string('attach_file');
            $table->timestamp('date_review');
            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
            $table->foreign('drdrform_id')->references('id')
                    ->on('drdrforms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('drdrreviewer_status', function (Blueprint $table) {
            $table->integer('drdrreviewer_id')->unsigned();
            $table->foreign('drdrreviewer_id')->references('id')->on('drdrreviewers')
                    ->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')
                    ->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('drdrreviewer_user', function (Blueprint $table) {
            $table->integer('drdrreviewer_id')->unsigned();
            $table->foreign('drdrreviewer_id')->references('id')->on('drdrreviewers')
                    ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('drdrreviewer_user');
        Schema::dropIfExists('drdrreviewer_status');
        Schema::dropIfExists('drdrreviewers');
    }
}
