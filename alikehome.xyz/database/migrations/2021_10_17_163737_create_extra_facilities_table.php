<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->nullable();
            $table->string('extra_facilities1')->nullable();
            $table->string('extra_facilities2')->nullable();
            $table->string('extra_facilities3')->nullable();
            $table->string('extra_facilities4')->nullable();
            $table->string('extra_facilities5')->nullable();
            $table->string('extra_facilities6')->nullable();
            $table->string('extra_facilities7')->nullable();
            $table->string('extra_facilities8')->nullable();
            $table->string('extra_facilities9')->nullable();
            $table->string('extra_facilities10')->nullable();
            $table->string('extra_facilities11')->nullable();
            $table->string('extra_facilities12')->nullable();
            $table->string('extra_facilities13')->nullable();
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
        Schema::dropIfExists('extra_facilities');
    }
}
