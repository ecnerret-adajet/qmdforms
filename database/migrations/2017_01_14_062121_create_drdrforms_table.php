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
            $table->string('name');
            $table->string('document_title');
            $table->string('revision_number');
            $table->text('reason_request');
            $table->string('attach_file');
            $table->timestamp('date_request');
            $table->boolean('active')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('drdrform_user', function (Blueprint $table) {
            $table->integer('drdrform_id')->unsigned();
            $table->foreign('drdrform_id')->references('id')->on('drdrforms')
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
        Schema::dropIfExists('drdrform_user');
        Schema::dropIfExists('drdrforms');
    }
}
