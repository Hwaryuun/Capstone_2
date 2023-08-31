<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');

            $table->unsignedBigInteger('orderitemprice_id');
            $table->foreign('orderitemprice_id')->references('id')->on('orderitemprice')->onDelete('cascade');

            $table->string('size')->nullable();
            $table->string('paperdefault');
            $table->integer('quantity');
            $table->string('cover')->nullable();
            $table->string('page')->nullable();        
            $table->string('files')->nullable();
            $table->string('status')->nullable();
            $table->string('tracking_old')->nullable();
            $table->float('price');
            $table->softDeletes();          
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
        Schema::dropIfExists('ordered_items');
    }
};
