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
            
            $table->string('name');
            $table->string('position');
            $table->string('company');
            $table->timestamp('date_issuance');
            // $table->string('customer_reference');
            $table->string('brand_name');
            $table->string('affected_quantities');
            $table->string('product_no');
            $table->string('quantity_received');
            $table->timestamp('date_delivery');
            $table->timestamp('return_date');
            $table->boolean('wet_lumpy')->default(0);
            $table->boolean('busted_bag')->default(0);
            $table->boolean('under_over_weight')->default(0);
            $table->boolean('infested')->default(0);
            $table->boolean('dirty_package')->default(0);
            $table->string('others');

            $table->string('attach_file');
            $table->boolean('active')->default(1);
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
