<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id', 'level_fk_4736535')->references('id')->on('levels');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_fk_4736536')->references('id')->on('subjects');
        });
    }
}
