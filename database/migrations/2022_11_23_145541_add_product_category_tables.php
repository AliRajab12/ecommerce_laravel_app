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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('product_id');
            $table->string('title');
            $table->double('price');
            $table->string('description');
            $table->string('category');
            $table->string('image');
            $table->double('rate');
            $table->integer('count');
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('category_id');
            $table->string('title');
        });

        // Schema::create('product_categories', function (Blueprint $table) {
        //     $table->integer('product_id');
        //     $table->integer('category_id');
        //     $table->foreign('product_id')
        //           ->references('product_id')
        //           ->on('products')->onDelete('cascade');

        //     $table->foreign('category_id')
        //           ->references('category_id')
        //           ->on('categories')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        // Schema::dropIfExists('product_categories');
    }
};
