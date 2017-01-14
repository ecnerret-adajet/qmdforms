<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdrformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddrforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ddr_no');
            $table->text('reason_distribution');
            $table->timestamp('date_needed');
            $table->timestamp('date_requested');
            $table->timestamp('date_approval');
            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ddrform_department', function (Blueprint $table) {
            $table->integer('ddrform_id')->unsigned();
            $table->foreign('ddrform_id')->references('id')->on('ddrforms')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ddrform_status', function (Blueprint $table) {
            $table->integer('ddrform_id')->unsigned();
            $table->foreign('ddrform_id')->references('id')->on('ddrforms')->onDelete('cascade');
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
        Schema::dropIfExists('ddrform_status');
        Schema::dropIfExists('ddrform_department');
        Schema::dropIfExists('ddrforms');
    }
}
