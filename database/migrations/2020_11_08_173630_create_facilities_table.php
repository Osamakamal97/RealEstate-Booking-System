<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->enum('place', [0, 1]); // 0 for indoor, 1 for outdoor
            $table->unsignedTinyInteger('status')->default(0);
            //This will specify some facilities for wedding hall only, 0 not for it, 1 shared, 2 only for wedding hall
            $table->enum('for_wedding_hall', [0, 1, 2])->default(0);
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
        Schema::dropIfExists('indoor_facilities');
    }
}
