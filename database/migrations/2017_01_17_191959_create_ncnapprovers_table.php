<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcnapproversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncnapprovers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('ncnform_id')->unsigned();

            
            $table->string('remarks');
            $table->timestamp('date_approval');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ncnapprover_status', function (Blueprint $table) {
            $table->integer('ncnapprover_id')->unsigned();
            $table->foreign('ncnapprover_id')->references('id')->on('ncnapprovers')
                    ->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')
                    ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ncnapprover_user', function (Blueprint $table) {
            $table->integer('ncnapprover_id')->unsigned();
            $table->foreign('ncnapprover_id')->references('id')->on('ncnapprovers')
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
        Schema::dropIfExists('ncnapprover_user');
        Schema::dropIfExists('ncnapprover_status');
        Schema::dropIfExists('ncnapprovers');
    }
}
