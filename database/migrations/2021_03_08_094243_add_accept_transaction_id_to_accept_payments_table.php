<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptTransactionIdToAcceptPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accept_payments', function (Blueprint $table) {
            $table->integer('package_id')->nullable()->after('service_id');
            $table->string('accept_transaction_id')->nullable()->after('package_id');
            $table->string('paid')->nullable()->after('type');
            $table->string('paid_at')->nullable()->after('paid');
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
            $table->dropColumn('package_id');
            $table->dropColumn('accept_transaction_id');
            $table->dropColumn('paid');
            $table->dropColumn('paid_at');
        });
    }
}
