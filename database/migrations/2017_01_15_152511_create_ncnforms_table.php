<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNcnformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncnforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('position');

            // $table->boolean('customer_returns')->default(0);
            // $table->boolean('process_related')->default(0);
            // $table->boolean('contracted_services')->default(0);
            // $table->boolean('objective_not_met')->default(0);
            $table->boolean('vendor')->default(0);
            $table->string('others');

            $table->string('notif_number');
            $table->string('recurrence_no');
            $table->timestamp('date_issuance');
            $table->string('issued_by'); //ask where this will come from
            $table->string('issued_position'); // ask this field, where will this come from
            $table->text('details_non_conformity');
            $table->string('attach_file');
            $table->boolean('active')->default(1);
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('company_ncnform', function (Blueprint $table) {
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('ncnform_id')->unsigned();
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('department_ncnform', function (Blueprint $table) {
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('ncnform_id')->unsigned();
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('ncnform_status', function (Blueprint $table) {
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->integer('ncnform_id')->unsigned();
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('ncnform_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ncnform_id')->unsigned();
            $table->foreign('ncnform_id')->references('id')->on('ncnforms')->onDelete('cascade');
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
        Schema::dropIfExists('ncnform_user');
        Schema::dropIfExists('ncnform_status');
        Schema::dropIfExists('department_ncnform');
        Schema::dropIfExists('company_ncnform');
        Schema::dropIfExists('ncnforms');
    }
}
