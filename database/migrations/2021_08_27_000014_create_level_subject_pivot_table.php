<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('level_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id', 'level_id_fk_4736540')->references('id')->on('levels')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_4736540')->references('id')->on('subjects')->onDelete('cascade');
        });
    }
}
