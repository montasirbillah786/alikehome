<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('product_quantuty')->defualt(1);
            $table->integer('sales_update')->defualt(0);
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
        Schema::dropIfExists('carts');
    }
}
