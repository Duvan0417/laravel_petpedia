<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            
            $table->id();
            $table->decimal('total', 10, 2);
            $table->date('payment_date');


            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');

            //$table->unsignedBigInteger('payment_method_id');
            //$table->foreign('payment_method_id')
                  //->references('id')
                  //->on('payment_methods')
                  //->onDelete('cascade');


            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
