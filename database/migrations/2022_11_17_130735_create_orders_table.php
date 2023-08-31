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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id') ->on('customers')->onUpdate('cascade');
            $table->string('tracking_no');
            $table->string('fullname');
            $table->string('phone');
            $table->string('emailadd');
            $table->string('remarks')->nullable();
            $table->string('status');
            $table->float('paid');   
            $table->string('paymentmode');
            $table->string('paymenttype')->nullable();
            $table->string('payment_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
