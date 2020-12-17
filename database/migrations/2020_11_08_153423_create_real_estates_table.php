<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 150);
            $table->string('type', 30);
            $table->string('address');
            $table->string('postal_code', 10);
            $table->string('google_map_address');
            $table->boolean('post_in_other_websites')->default(false);
            $table->text('photos')->default(null);
            $table->double('price'); //for one night
            $table->unsignedTinyInteger('days_before_cancel_book');
            $table->boolean('is_cancel_book_free')->default(true);
            $table->string('discount_percent_when_cancel_book', 2)->default('10');
            $table->enum('confirmed', ['-1', '0', '1'])->default(0);
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estates');
    }
}
