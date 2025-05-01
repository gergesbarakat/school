<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('phone', 'number_of_classes');
            $table->renameColumn('subject_id', 'row_id');
        });
    }

    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->renameColumn('number_of_classes', 'phone');
            $table->renameColumn('row_id', 'subject_id');
        });
    }
}
