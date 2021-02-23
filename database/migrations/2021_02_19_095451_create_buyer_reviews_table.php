<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('service_id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->string('communication_rating')->nullable();
            $table->string('service_rating')->nullable();
            $table->string('recommend_rating')->nullable();
            $table->string('overall_rating')->nullable();
            $table->string('review');
            $table->date('date');
            $table->longText('skill_endorsement')->nullable();
            $table->enum('show_work',['0','1'])->default('0');
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
        Schema::dropIfExists('buyer_reviews');
    }
}
