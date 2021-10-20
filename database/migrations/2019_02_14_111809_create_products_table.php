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
            $table->increments('id');
            $table->string('code');
            $table->text('description');
            $table->integer('packing');
            $table->integer('piece_cart_weight');
            $table->tinyInteger('size_type1');
            $table->double('size_value1',8,2);
            $table->tinyInteger('size_type2');
            $table->double('size_value2',8,2);
            $table->double('price',8,2);
            $table->boolean('is_hidden')->default('0');
            $table->boolean('in_stock')->default('0');
            $table->string('image'); 
            $table->integer('brand_id');
            $table->integer('category_id');
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
