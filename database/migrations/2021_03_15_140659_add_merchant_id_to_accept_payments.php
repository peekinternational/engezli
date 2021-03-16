<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMerchantIdToAcceptPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accept_payments', function (Blueprint $table) {
            $table->integer('merchant_order_id')->nullable()->after('id');
            $table->string('order_duration')->nullable()->after('paid_at');
            $table->string('order_qty')->nullable()->after('order_duration');
            $table->string('order_fee')->nullable()->after('order_qty');
            $table->string('service_fee')->nullable()->after('order_fee');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accept_payments', function (Blueprint $table) {
            //
        });
    }
}
