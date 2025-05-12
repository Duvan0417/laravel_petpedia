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
            $table->decimal('qualifications');
            $table->decimal('phone');
            $table->string('gmail');
            $table->longText('biography');
            $table->timestamps();
 
    $table->unsignedBigInteger('trainer_id')->nullable()->constrained('trainers')->ondelete('set null');
    
    $table->unsignedBigInteger('appointment_id')->nullable()->constrained('appointments')->ondelete('set null');
    
    $table->unsignedBigInteger('shelter_id')->nullable()->constrained('shelters')->ondelete('set null');
    
    $table->unsignedBigInteger('user_id')->nullable()->constrained('users')->ondelete('set null');
   
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
