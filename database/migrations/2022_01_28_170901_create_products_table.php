<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_idn');
            $table->string('product_slub_en');
            $table->string('product_slug_idn');
            $table->stringid('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_idn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_idn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_idn');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc_en');
            $table->string('short_desc_idn');
            $table->string('long_desc_idn');
            $table->string('long_desc_idn');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
