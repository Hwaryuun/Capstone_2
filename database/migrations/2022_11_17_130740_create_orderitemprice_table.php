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
        Schema::create('orderitemprice', function (Blueprint $table) {
            $table->id();
            $table->float('sizeprice')->nullable();
            $table->float('defaultprice')->nullable();
            $table->float('coverprice')->nullable();
            $table->float('leafprice')->nullable();
            $table->string('quantity')->nullable();
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
        Schema::dropIfExists('orderitemprice');
    }
};
