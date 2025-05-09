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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('species');
            $table->string('breed');
            $table->decimal('size');
            $table->string('sex');
            $table->longText('description');
            
            $table->foreignId('appointment_id')->constrained('appointments')->onDelete('set null');
            $table->foreignId('shelter_id')->constrained('shelters')->onDelete('set null');
            $table->foreignId('trainer_id')->constrained('trainers')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
