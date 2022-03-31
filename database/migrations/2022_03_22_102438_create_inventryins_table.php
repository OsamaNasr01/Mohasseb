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
        Schema::create('inventryins', function (Blueprint $table) {
            $table->id();
            $table->foreign('product_id')-> referance('id')->on('products');
            $table->foreign('pinvoice_id')-> referance('id')->on('pinvoices');
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
        Schema::dropIfExists('inventryins');
    }
};
