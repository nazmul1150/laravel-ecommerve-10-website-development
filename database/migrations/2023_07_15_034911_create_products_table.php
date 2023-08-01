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
            $table->string('name');
            $table->string('slug');
            $table->decimal('price');
            $table->decimal('dis_price')->nullable();
            $table->string('dis_percent')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('warranty')->nullable();
            $table->string('return_policy')->nullable();
            $table->integer('cash_on_delivery')->default(0);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('sku');
            $table->string('tags')->nullable();
            $table->enum('stock_status',['instock','outofstock']);
            $table->text('description');
            $table->text('additional_info')->nullable();
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('subcategory_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('product_sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
