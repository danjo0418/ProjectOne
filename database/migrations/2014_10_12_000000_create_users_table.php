<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code');
            $table->integer('teamlead_id')->nullable();
            $table->integer('is_teamlead')->nullable();
            $table->integer('role_id');
            $table->text('profile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fname');
            $table->string('lname');
            $table->string('phone');
            $table->string('socialmedia')->nullable();
            $table->enum('status', ['active','inactive']);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('is_approved')->default(0);
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
