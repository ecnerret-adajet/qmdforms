<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcnnotifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncnnotifieds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ncnform_id')->unsigned();
            $table->string('name'); // notified person who put and immediate action fields.
            $table->string('position'); 
            $table->text('action_taken');
            $table->string('responsible');
            $table->timestamp('execution_date');
            $table->foreign('ncnform_id')->references('id')
                   ->on('ncnforms')->onDelete('cascade');
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
        Schema::dropIfExists('ncnnotifieds');
    }
}
