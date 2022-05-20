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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('name');
            $table->string('phone_number');
            $table->text('shipping_address');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('total_price')->nullable();
            $table->string('invoice_id')->nullable();
            $table->boolean('pending')->default(0)->nullable();
            $table->boolean('confirmed')->default(0)->nullable();
            $table->boolean('processing')->default(0)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
