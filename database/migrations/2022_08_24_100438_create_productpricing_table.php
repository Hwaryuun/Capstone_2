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
        Schema::create('productpricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id') ->on('products')->onUpdate('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id') ->on('size')->onUpdate('cascade');
            $table->unsignedBigInteger('pricingtype_id');
            $table->foreign('pricingtype_id')->references('id') ->on('pricingtype')->onUpdate('cascade');
            $table->float('price');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productpricing');
    }
};
