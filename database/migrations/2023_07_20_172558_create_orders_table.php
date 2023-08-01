<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('add1');
            $table->string('add2')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country');
            $table->enum('status',['ordered','panding','delivered','canceled'])->default('ordered');
            $table->date('delivery_date')->nullable();
            $table->date('cancel_date')->nullable();
            $table->boolean('shipping_different')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
