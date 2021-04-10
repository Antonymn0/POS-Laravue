<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('slug')->required();
            $table->string('status')->required();
            $table->string('visibility')->required();
            $table->string('type')->required();
            $table->text('sku')->required();
            $table->double('regular_price')->required();
            $table->text('description')->nullable();
            $table->text('summary')->nullable();
            $table->double('sale_price')->nullable();
            $table->tinyInteger('taxable')->nullable();
            $table->double('weight')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->text('purchase_note')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('sell_button_text')->nullable();
            $table->tinyInteger('virtual')->nullable();
            $table->tinyInteger('downloadable')->nullable();
            $table->timestamp('sale_start_date')->nullable();
            $table->timestamp('sale_end_date')->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->string('featured_img')->nullable();
            
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
        Schema::dropIfExists('products');
    }
}
