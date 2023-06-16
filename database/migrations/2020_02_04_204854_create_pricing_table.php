<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->bigInteger('weight_id')->unsigned();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->integer('price');
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
        Schema::dropIfExists('pricing');
    }
}
