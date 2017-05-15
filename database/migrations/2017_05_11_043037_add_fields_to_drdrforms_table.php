<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToDrdrformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drdrforms', function (Blueprint $table) {
            $table->boolean('review_status')->default(0);
            $table->boolean('approve_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drdrforms', function (Blueprint $table) {
            $table->dropColumn('review_status');
            $table->dropColumn('approve_status');
        });
    }
}
