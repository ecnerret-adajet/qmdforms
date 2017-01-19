<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrdrapproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drdrapprovers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
             $table->integer('drdrform_id')->unsigned();

            $table->string('name');
            $table->string('remarks');
            $table->timestamp('date_approved');
            $table->string('attach_file');
            $table->timestamp('date_effective');
            
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
            $table->foreign('drdrform_id')->references('id')
                    ->on('drdrforms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('drdrapprover_status', function (Blueprint $table) {
            $table->integer('drdrapprover_id')->unsigned();
            $table->foreign('drdrapprover_id')->references('id')->on('drdrapprovers')->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::dropIfExists('drdrapprover_status');
        Schema::dropIfExists('drdrapprovers');
    }
}
