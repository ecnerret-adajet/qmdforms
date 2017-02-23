<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDdrmrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddrmrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ddrform_id')->unsigned();
            $table->string('name');
            $table->string('position');
            $table->timestamp('verified_date');
            $table->foreign('ddrform_id')->references('id')->on('ddrforms')
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
        Schema::dropIfExists('ddrmrs');
    }
}
