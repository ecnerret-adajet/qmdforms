<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrdrcopyholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drdrcopyholders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drdrapprover_id')->unsigned();
            
            $table->string('copy_no');
            $table->string('copyholder');

            $table->foreign('drdrapprover_id')->references('id')
                   ->on('drdrapprovers')->onDelete('cascade');
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
        Schema::dropIfExists('drdrcopyholders');
    }
}
