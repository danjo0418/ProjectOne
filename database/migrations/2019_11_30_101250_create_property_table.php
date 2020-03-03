<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->enum('offer_type',['buy','rent']);
            $table->integer('type_id');
            $table->integer('status_id');
            $table->string('name');
            $table->text('about')->nullable();
            $table->integer('bedrooms')->nullable();    
            $table->integer('bathrooms')->nullable();
            $table->float('floor_area')->nullable();
            $table->float('land_size')->nullable();
            $table->string('building_name')->nullable();
            $table->string('block_lotnum')->nullable();
            $table->string('developer')->nullable();
            $table->enum('furnished',['Fully Furnished','Semi Furnished','Fully Finished','Semi Finished','Bare'])->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('car_space')->nullable();
            $table->integer('build_year')->nullable();
            $table->string('deposit_bond')->nullable();
            $table->string('price');
            $table->enum('price_condition',['monthly','yearly'])->nullable();
            $table->string('street_barangay');
            $table->string('city_municipality');
            $table->string('province');
            $table->text('map')->nullable();
            $table->integer('is_featured')->default(0);
            $table->integer('is_approved')->default(0);
            $table->integer('created_by');
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
        Schema::dropIfExists('property');
    }
}
