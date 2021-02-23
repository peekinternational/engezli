<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_conversations', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('sender_id');
            $table->string('message')->nullable();
            $table->string('file')->nullable();
            $table->string('file_name')->nullable();
            $table->enum('message_type',['message','image','file','delivery'])->default('message');
            $table->date('date');
            $table->longText('reason')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('order_conversations');
    }
}
