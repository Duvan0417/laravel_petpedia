<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            
            // Order relationship
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
            
            $table->string('shipping_address'); // dirección_envio
            $table->decimal('cost', 10, 2); // costo
            $table->string('status')->default('processing'); // estado
            $table->string('shipping_method'); // método_envio
            
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
};