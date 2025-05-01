<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignKeysFromSchoolClassesTable extends Migration
{
    public function up()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['school_id']);
        });
    }

    public function down()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }
}
