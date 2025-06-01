<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // ← Ganti dari WeeklyProgress() ke up()
    {
        Schema::create('weekly_progress', function (Blueprint $table) { // ← Gunakan snake_case
            $table->id();
            $table->string('day');
            $table->integer('sleep_hours');
            $table->integer('healthy_meals');
            $table->integer('workout_sessions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_progress'); // ← Sudah benar
    }
};
