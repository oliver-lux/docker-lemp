<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('manufacturer_id')->unsigned();
            $table->string('product_code')->unique();
            $table->string('description', 1000);
            $table->string('image')->nullable();
            $table->string('origin');
            $table->string('price_group');
            $table->decimal('weight', 8, 3);
            $table->integer('tariff_code');
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
        Schema::dropIfExists('products');
    }
}
