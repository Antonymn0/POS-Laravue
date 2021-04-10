<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->required()->index();
            $table->integer('order_id')->required()->index();
            $table->string('product_name')->required();
            $table->text('description')->nullable();
            $table->integer('quantity')->required();
            $table->double('product_price')->required();
            $table->double('discount_per_unit')->default(0);
            $table->double('total_discount_amount')->default(0);
            $table->double('discount_percentage')->default(0);
            $table->double('price_per_unit')->required();
            $table->double('total_amount')->required();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
