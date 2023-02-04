<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoinpackProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koinpack_products', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id');
            $table->string('category');
            $table->boolean('flavours')->default(0);
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('info')->nullable();
            $table->double('price')->default(0);
            $table->string('return_refund')->nullable();
            $table->string('shipping_info')->nullable();
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
        Schema::dropIfExists('koinpack_products');
    }
}
