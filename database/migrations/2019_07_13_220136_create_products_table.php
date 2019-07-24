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
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('slug');
            // mo ta sp 
            $table->text('description');
            $table->string('image');
            //so luong
            $table->integer('quantity');
            $table->text('price');
            // gia khuyen mai 
            $table->text('promotional');
            // khuyen mai dac biet
            $table->text('special_promotion');
            //cam ket
            $table->text('commitment');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_product_type')->unsigned();
            $table->foreign('id_product_type')->references('id')->on('product_type')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('product');
    }
}
