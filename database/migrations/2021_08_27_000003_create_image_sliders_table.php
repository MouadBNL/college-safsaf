<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('image_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->string('label')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
