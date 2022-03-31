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
        Schema::create('inventryouts', function (Blueprint $table) {
            $table->id();
            $table->foreign('product_id')-> referance('id')->on('products');
            $table->foreign('sinvoice_id')-> referance('id')->on('sinvoices');
            $table->integer('no');
            $table->integer('price');
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
        Schema::dropIfExists('inventryouts');
    }
};
