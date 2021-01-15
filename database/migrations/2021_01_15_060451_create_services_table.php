<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->longText('service_title');
            $table->string('service_url');
            $table->string('seo_title');
            $table->integer('cat_id');
            $table->integer('cat_child_id');
            $table->string('search_tags');
            $table->longText('service_desc');
            $table->longText('service_img1');
            $table->longText('service_img2')->nullable();
            $table->longText('service_img3')->nullable();
            $table->longText('service_video')->nullable();
            $table->longText('service_pdf1')->nullable();
            $table->longText('service_pdf2')->nullable();
            $table->longText('service_status');
            $table->longText('posted_date');
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
        Schema::dropIfExists('services');
    }
}
