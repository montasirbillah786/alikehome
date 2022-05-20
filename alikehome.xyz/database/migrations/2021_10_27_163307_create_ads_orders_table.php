<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ads_id')->nullable();
            $table->string('company_name')->nullable();
            $table->text('big_offer_text')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('hostel_address')->nullable();
            $table->text('hostel_details')->nullable();
            $table->text('hostel_image')->nullable();
            $table->text('product_image')->nullable();

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
        Schema::dropIfExists('ads_orders');
    }
}
