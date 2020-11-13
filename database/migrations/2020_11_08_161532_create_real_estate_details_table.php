<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('real_estate_id');
            $table->unsignedTinyInteger('bedrooms_number');
            $table->unsignedTinyInteger('beds_numbers');
            $table->unsignedTinyInteger('single_beds_numbers');
            $table->unsignedTinyInteger('double_beds_numbers');
            $table->unsignedTinyInteger('bathroom_numbers');
            $table->unsignedTinyInteger('guest_number');
            $table->text('indoor_facilities');
            $table->text('outdoor_facilities');
            $table->unsignedTinyInteger('smoke_allow')->default(0);
            $table->unsignedTinyInteger('pets_allow')->default(0);
            $table->unsignedTinyInteger('kids_allow')->default(0);
            $table->unsignedTinyInteger('party_allow')->default(0);
            $table->timestamp('start_arrive_at');
            $table->timestamp('end_arrive_at');
            $table->timestamp('start_leave_at');
            $table->timestamp('end_leave_at');
            $table->timestamps();
            $table->foreign('real_estate_id')->references('id')->on('real_estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_detalis');
    }
}
