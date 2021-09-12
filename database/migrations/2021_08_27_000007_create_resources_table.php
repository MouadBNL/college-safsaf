<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('type');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
