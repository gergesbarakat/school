<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Subject;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
             $table->foreignIdFor(Subject::class) ; // Add foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
             $table->dropColumn('subject_id');
        });
    }
};
