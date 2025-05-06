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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('shelter_id')->constrained('shelters')->onDelete('cascade');
            $table->foreignId('services_id')->constrained('services')->onDelete('cascade');
            $table->timestamp('date');
            $table->integer('priority');
            $table->string('solicitation_status');
            $table->foreignId('appointment_id')->constrained('appointments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
