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
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Cambiado a unsignedBigInteger para mayor compatibilidad
            $table->string('type');
            $table->string('details');
            $table->date('issue_date');
            $table->integer('CCV');
            $table->timestamps();

            // Definición de clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentmethods'); // Corregido el nombre para que coincida con la creación
    }
};
