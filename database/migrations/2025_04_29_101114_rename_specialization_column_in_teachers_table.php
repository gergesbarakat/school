<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSpecializationColumnInTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('specialization', 'no7');
        });
    }

    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('no7', 'specialization');
        });
    }
}
