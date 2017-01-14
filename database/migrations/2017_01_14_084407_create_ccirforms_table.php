<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcirformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ccirforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('issuer');
            $table->timestamp('date_issuance');
            $table->string('customer_reference');
            $table->string('brand_name');
            $table->string('affected_quantities');
            $table->string('product_no');
            $table->timestamp('date_delivery');
            $table->string('verification');
            $table->string('attach_file');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ccirform_company', function (Blueprint $table) {
            $table->integer('ccirform_id')->unsigned();
            $table->foreign('ccirform_id')->references('id')->on('ccirforms')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('ccirform_company');
        Schema::dropIfExists('ccirforms');
    }
}
