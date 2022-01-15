<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->unsignedBigInteger('category_property_id')->nullable();
            $table->unsignedBigInteger('category_value_id')->nullable();
			$table->foreign('category_property_id')->references('id')->on('categories');
			$table->foreign('category_value_id')->references('id')->on('categories');
			$table->foreign('ad_id')->references('id')->on('ads');
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
        Schema::dropIfExists('ad_data');
    }
}
