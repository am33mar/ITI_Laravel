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
        Schema::create('students_data', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->integer('grade')->default(0);
            $table->enum('gender', ['male', 'female']);
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_data');
    }
};
