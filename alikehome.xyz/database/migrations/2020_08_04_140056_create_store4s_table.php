<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStore4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store4s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note')->nullable();
            $table->string('sell_description')->nullable();
            $table->string('sell_note')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1)->nullable();
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
        Schema::dropIfExists('store4s');
    }
}
