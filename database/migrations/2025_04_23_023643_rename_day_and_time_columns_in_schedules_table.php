<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->renameColumn('day', 'classes_per_week');
            $table->renameColumn('time', 'row_id');
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->renameColumn('classes_per_week', 'day');
            $table->renameColumn('row_id', 'time');
        });
    }
};