<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // FK a orders
            $table->unsignedBigInteger('product_id'); // FK a products
            $table->integer('quantity'); // Cantidad comprada
            $table->decimal('unit_price', 10, 2); // Precio en el momento de la compra
            $table->timestamps();

            // Claves foráneas
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade'); // Si se borra el pedido, se borran sus ítems

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};