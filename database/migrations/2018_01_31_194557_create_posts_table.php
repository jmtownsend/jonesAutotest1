<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vin');
            $table->decimal('price');
            $table->string('extColor');
            $table->string('intColor');
            $table->decimal('mileage');
            $table->string('bodyStyle');
            $table->string('driveType');
            $table->string('engine');
            $table->string('transmission');
            $table->string('fuelType');
            $table->string('mpg');
            $table->string('title');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->mediumText('features');
            $table->binary('sold');
            $table->integer('views');
            $table->integer('user_id');
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
        Schema::dropIfExists('posts');
    }
}
