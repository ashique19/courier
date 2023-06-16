<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pricing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('weight_id')->unsigned();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->bigInteger('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->integer('price')->unsigned()->default(0);
            $table->integer('cod_above')->unsigned()->default(0);
            $table->tinyInteger('cod_percentage')->unsigned()->default(0);
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
        Schema::dropIfExists('user_pricing');
    }
}
