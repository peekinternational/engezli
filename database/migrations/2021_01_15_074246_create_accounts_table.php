<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('withdrawn')->default('0');
            $table->integer('pending_clearance')->default('0');
            $table->integer('current_balance')->default('0');
            $table->integer('fornightly_earning')->default('0');
            $table->integer('monthly_earning')->default('0');
            $table->integer('total_earning')->default('0');
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
        Schema::dropIfExists('accounts');
    }
}
