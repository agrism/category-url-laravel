<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRouteFragments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_fragments', function (Blueprint $table) {
            $table->id();
            $table->integer('route_id');
            $table->integer('parent_category_id');
            $table->integer('selected_child_category_id')->nullable();
            $table->integer('deep')->default(1)->nullable();
            $table->float('order')->nullable();
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
        Schema::dropIfExists('route_fragments');
    }
}