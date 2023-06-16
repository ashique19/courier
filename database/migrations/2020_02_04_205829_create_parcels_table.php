<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sender_id')->unsigned()->nullable()->default(null);
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('set null');
            $table->string('receiver_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->bigInteger('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->bigInteger('weight_id')->unsigned();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');
            $table->integer('cash_to_collect')->default(0);
            $table->integer('cash_collected')->default(0);
            $table->integer('charge')->default(0);
            $table->integer('cod')->default(0);
            $table->integer('payment')->default(0);
            $table->string('status')->nullable();
            $table->string('sender_note')->nullable();
            $table->tinyInteger('is_return')->default(0);
            $table->bigInteger('parcel_id')->unsigned()->nullable()->default(null);
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('set null');
            $table->bigInteger('held_by')->unsigned()->nullable()->default(null);
            $table->foreign('held_by')->references('id')->on('users')->onDelete('set null');
            $table->bigInteger('created_by')->unsigned()->nullable()->default(null);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('parcels');
    }
}
