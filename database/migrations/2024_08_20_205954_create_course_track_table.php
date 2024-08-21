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
        Schema::create('course_track', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->default(null);
            $table->unsignedBigInteger('track_id')->default(null);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('track_id')->references('id')->on('tracks_data')->onDelete('cascade');
            $table->primary(['course_id', 'track_id']); // Composite primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_track');
    }
};
