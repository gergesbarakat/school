<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeClassIdNullableInSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Make the class_id nullable
            $table->unsignedBigInteger('classroom_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            // If rolling back, make it non-nullable
            $table->unsignedBigInteger('classroom_id')->nullable(false)->change();
        });
    }
}
