<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSpecializationInTeachersTable extends Migration
{
    public function up()
    {
        DB::table('teachers')->update(['specialization' => 'o7']);
    }

    public function down()
    {
        // Optional: revert to null or previous value if needed
        DB::table('teachers')->update(['specialization' => null]);
    }
};
