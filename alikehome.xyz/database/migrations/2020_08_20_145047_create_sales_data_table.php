<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_data', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('sales_id')->nullable();
            $table->string('sales_name')->nullable();
            $table->string('sales_sales_number')->nullable();
            $table->string('sales_ip_address')->nullable();
            $table->string('sales_transaction_number')->nullable();
            $table->string('sales_short_name')->nullable();

            $table->string('sales_shipping_address')->nullable();
            $table->string('sales_created_at')->nullable();
            $table->string('sales_title')->nullable();
            $table->integer('sales_quantity')->nullable();
            $table->string('sales_offer_price')->nullable();
            $table->string('sales_total')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('invoice_id')->nullable();

            $table->string('sales_is_paid')->default(0)->nullable();
            $table->string('sales_is_picked')->default(0)->nullable();
            $table->string('sales_is_shipped')->default(0)->nullable();
            $table->string('sales_is_delivered')->default(0)->nullable();
            $table->string('sales_is_cancle')->default(0)->nullable();

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
        Schema::dropIfExists('sales_data');
    }
}
