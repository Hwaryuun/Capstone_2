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
        Schema::create('quantity', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->float('value');
            $table->unsignedBigInteger('categorytype_id');
            $table->foreign('categorytype_id')->references('id') ->on('categorytype')->onUpdate('cascade');
            $table->unsignedBigInteger('pricingtype_id');
            $table->foreign('pricingtype_id')->references('id') ->on('pricingtype')->onUpdate('cascade');
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
        Schema::dropIfExists('quantity');
    }
};
