<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured', function (Blueprint $table) {
            $table->id();
            $table->string('name')->Unique();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id') ->on('products')->onUpdate('cascade');
            $table->unsignedBigInteger('design_id');
            $table->foreign('design_id')->references('id') ->on('design')->onUpdate('cascade');
            $table->date('date');
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
        Schema::dropIfExists('featured');
    }
};
