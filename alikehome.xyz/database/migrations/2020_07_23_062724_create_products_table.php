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
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('offer_price')->nullable();
            $table->integer('admin_id')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('room_id')->nullable();
            $table->string('floor_no')->nullable();
            $table->string('available_date')->nullable();
            $table->string('balcony')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('deal_of_week')->default(0);
            $table->tinyInteger('flash_sell')->default(0);
            $table->tinyInteger('offer')->default(0);
            $table->tinyInteger('jfu')->default(0);
            $table->integer('product_active')->default(0);
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
