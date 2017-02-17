<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdrlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddrlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ddrform_id')->unsigned();

            $table->string('document_title');
            $table->string('control_code');
            $table->string('rev_no');
            $table->string('copy_no');
            $table->string('copy_holder');
            $table->string('recieved_by');
            $table->timestamp('date_list');


            $table->foreign('ddrform_id')->references('id')
                   ->on('ddrforms')->onDelete('cascade');
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
        Schema::dropIfExists('ddrlists');
    }
}
