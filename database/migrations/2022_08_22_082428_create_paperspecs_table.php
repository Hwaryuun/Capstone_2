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
        Schema::create('paperspecs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id') ->on('category')->onUpdate('cascade');
            $table->unsignedBigInteger('papers_id');
            $table->foreign('papers_id')->references('id') ->on('papers')->onUpdate('cascade');          
            $table->unsignedBigInteger('papertypes_id');
            $table->foreign('papertypes_id')->references('id') ->on('papertypes')->onUpdate('cascade');
            $table->integer('lbs');
            $table->float('value');          
            $table->integer('quantity');
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
        Schema::dropIfExists('paperspecs');
    }
};
