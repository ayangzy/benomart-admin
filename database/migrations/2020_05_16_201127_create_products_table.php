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
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->string('slug')->nullable();
            $table->string('productName')->nullable();
            $table->string('productPrice')->nullable();
            $table->string('productSize')->nullable();
            $table->string('productColor')->nullable();
            $table->text('productDescription')->nullable();
            $table->string('productImage1')->nullable();
            $table->string('productImage2')->nullable();
            $table->string('productImage3')->nullable();
            $table->integer('user_id')->unsigned();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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