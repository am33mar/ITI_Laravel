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
        Schema::table('students_data', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('track_id')->nullable(); // Add the column as nullable
            $table->foreign('track_id')
                ->references('id')->on('tracks_data')
                ->onDelete('cascade') // Optional: Set to null if the track is deleted
                ->onUpdate('cascade'); // Optional: Cascade updates if the track ID changes

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students_data', function (Blueprint $table) {
            //
        });
    }
};
