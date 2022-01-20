<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->string('thumb');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('details')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('status')->default(0);
            $table->string('link')->nullable();
            $table->string('domain')->nullable();
            $table->integer('cr_product_id')->default(0);

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
        Schema::dropIfExists('crawler_products');
    }
}
