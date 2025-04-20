<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->unsignedBigInteger('grade_id')->nullable()->after('id');

            // Add foreign key constraint to `grades` table
            $table->foreign('grade_id')
                  ->references('id')
                  ->on('grades')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeign(['grade_id']);
            $table->dropColumn('grade_id');
        });
    }
};
