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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tag')->Unique();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id') ->on('products')->onUpdate('cascade');
            $table->unsignedBigInteger('design_id');
            $table->foreign('design_id')->references('id') ->on('design')->onUpdate('cascade');
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
        Schema::dropIfExists('templates');
    }
};
