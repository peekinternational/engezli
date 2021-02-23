<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolution_centers', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('order_number');
            $table->integer('user_id');
            $table->string('reason');
            $table->string('details');
            $table->string('status');
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
        Schema::dropIfExists('resolution_centers');
    }
}
