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
    $table->string('specialty');
    $table->integer('experience');
    $table->decimal('qualifications', 8, 2);
    $table->string('phone', 20)->nullable();

    $table->string('gmail');
    $table->longText('biography')->nullable();
    $table->foreignId('trainer_id')->nullable()->constrained('trainers')->nullOnDelete();
    $table->foreignId('appointment_id')->nullable()->constrained('appointments')->nullOnDelete();
    $table->foreignId('shelter_id')->nullable()->constrained('shelters')->nullOnDelete();
    $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
    $table->timestamps(); // Solo esto
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
