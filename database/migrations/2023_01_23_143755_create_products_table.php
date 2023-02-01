<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('price');
            $table->string('sale_price');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->string('description');
            $table->integer('status')->default('1');
//            $table->timestamps();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id', 'product_category_ids');
            $table->foreign('category_id','product_category_fk')->on('categories')->references('id');

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
        Schema::dropIfExists('products');
    }
}
