<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->integer('order_id');
            $table->integer('buyer_id');
            $table->string('seller_rating');
            $table->string('service_rating');
            $table->string('recommanded_rating');
            $table->string('communication_rating');
            $table->longText('review');
            $table->string('review_date');
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
        Schema::dropIfExists('ratings');
    }
}
