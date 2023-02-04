<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoinpackProductconvertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koinpack_productconvert', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('favorite')->nullable();
            $table->string('internal')->nullable();
            $table->string('name')->nullable();
            $table->double('sales')->default(0);
            $table->double('cost')->default(0);
            $table->double('quantity')->default(0);
            $table->double('forecasted')->default(0);
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('koinpack_productconvert');
    }
}
