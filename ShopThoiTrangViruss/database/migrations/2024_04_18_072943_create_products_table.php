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

            $table->id('id_product');
            $table->string('id_category');
            $table->string('id_manufacturer');
            $table->string('name_product');
            $table->string('quantity_product');
            $table->string('price_product');
            $table->string('image_address_product');
            $table->text('describe_product');
            $table->string('specifications');
<<<<<<< HEAD
            $table->timestamps();
=======
            $table->string('sizes')->nullable(); // Thêm cột sizes
            $table->string('colors')->nullable(); // Thêm cột colors
            $table->timestamps();

>>>>>>> chitietsanpham
            
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
};
