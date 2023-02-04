<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinalPriceFieldToKoinpackProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('koinpack_products', function (Blueprint $table) {
            $table->text('brand')->nullable();
            $table->double('discount')->default(0);
            $table->double('final_price')->default(0);
            $table->string('description1')->nullable();
            $table->string('description2')->nullable();
            $table->string('delivery_Info')->nullable();
            $table->bigInteger('stock_availability')->default(0);
            $table->double('product_weight')->default(0);
            $table->text('unit')->nullable();
            $table->text('supplier_name')->nullable();
            $table->double('supplier_price')->default(0);
            $table->boolean('visibility')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('koinpack_products', function (Blueprint $table) {
            //
        });
    }
}
