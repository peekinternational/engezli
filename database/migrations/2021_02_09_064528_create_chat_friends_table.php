<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_friends', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->integer('message_id');
            $table->integer('offer_id')->nullable();
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->string('time');
            $table->enum('message_status',['read','unread','empty'])->default('empty');
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
        Schema::dropIfExists('chat_friends');
    }
}
