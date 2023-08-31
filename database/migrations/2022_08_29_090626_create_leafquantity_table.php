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
        Schema::create('leafquantity', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->float('value');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id') ->on('category')->onUpdate('cascade');
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
        Schema::dropIfExists('leafquantity');
    }
};
