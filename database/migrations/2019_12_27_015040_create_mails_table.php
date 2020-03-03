<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to');
            $table->string('code');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('title');
            $table->string('subject');
            $table->text('message')->nullable();
            $table->string('interested')->nullable();
            $table->text('property_sketch')->nullable();
            $table->string('property_sketch_extention')->nullable();
            $table->text('property_location')->nullable();
            $table->text('property_lotsize')->nullable();
            $table->string('property_code')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->integer('is_read')->default(0);
            $table->integer('is_deleted')->default(0);
            $table->dateTime('date_sent')->nullable();
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
        Schema::dropIfExists('mails');
    }
}
