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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
  $table->string('name');
  $table->decimal('price');
  $table->date('duration');
  $table->string('description');
  $table->foreignId('trainer_id')->nullable()->constrained('trainers')->onDelete('set null');
  $table->foreignId('veterinarian_id')->nullable()->constrained('veterinarians')->onDelete('set null');
  $table->foreignId('request_id')->nullable()->constrained('requests')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
