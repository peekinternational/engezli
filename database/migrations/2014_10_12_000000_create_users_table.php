<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('account_type')->nullable();
            $table->string('password');
            $table->longText('profile_image')->nullable();
            $table->longText('cover_image')->nullable();
            $table->string('verification');
            $table->string('user_status');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('description')->nullable();
            $table->string('recent_delivery')->nullable();
            $table->string('member_since')->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('skills_id')->nullable();
            $table->longText('occuption')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
