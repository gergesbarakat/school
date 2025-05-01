<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmailFromTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }

    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('email')->unique()->nullable(); // Adjust type if needed
        });
    }
}
