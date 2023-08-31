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
        Schema::create('usercart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');

            $table->unsignedBigInteger('cartprice_id');
            $table->foreign('cartprice_id')->references('id')->on('cartprice')->onDelete('cascade');

            $table->unsignedBigInteger('pricing_id');
            $table->foreign('pricing_id')->references('id')->on('productpricing')->onUpdate('cascade'); 

            $table->string('paperdefault');
            $table->integer('quantity');
            $table->string('cover')->nullable();
            $table->string('page')->nullable();      
            $table->string('files')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('usercart');
    }
};
        // $table->unsignedBigInteger('specs_id');
            // $table->foreign('specs_id')->references('id') ->on('paperspecs')->onUpdate('cascade');

            // $table->unsignedBigInteger('quantity_id');
            // $table->foreign('quantity_id')->references('id') ->on('quantity')->onUpdate('cascade');

            // $table->unsignedBigInteger('SpecsCover_id')->nullable();
            // $table->foreign('SpecsCover_id')->references('id') ->on('paperspecs')->onUpdate('cascade');
            
            // $table->unsignedBigInteger('leaf_id')->nullable();
            // $table->foreign('leaf_id')->references('id') ->on('leafquantity')->onUpdate('cascade');
