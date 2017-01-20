<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdrapproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddrapprovers', function (Blueprint $table)   {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('ddrform_id')->unsigned();
            
            $table->string('name');
            $table->string('remarks');
            $table->string('position');
            $table->timestamp('date_approved');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
             $table->foreign('ddrform_id')->references('id')->on('ddrforms')
                ->onDelete('cascade');    
            $table->timestamps();
        });

        Schema::create('ddrapprover_status', function (Blueprint $table) {
            $table->integer('ddrapprover_id')->unsigned();
            $table->foreign('ddrapprover_id')->references('id')->on('ddrapprovers')
                ->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')
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
        Schema::dropIfExists('ddrapprover_status');
        Schema::dropIfExists('ddrapprovers');
    }
}
