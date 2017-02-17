<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrdrmrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drdrmrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drdrform_id')->unsigned();
            $table->string('drdr_no');
            $table->string('document_title');
            $table->string('document_code');
            $table->string('revision_number');
            $table->string('verified_by');
            $table->timestamp('verified_date');
            $table->foreign('drdrform_id')->references('id')->on('drdrforms')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('drdrmr_user', function (Blueprint $table) {
            $table->integer('drdrmr_id')->unsigned();
            $table->foreign('drdrmr_id')->references('id')->on('drdrmrs')
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
        Schema::dropIfExists('drdrmr_user');
        Schema::dropIfExists('drdrmrs');
    }
}
