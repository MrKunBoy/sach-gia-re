<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('coupon_code')->nullable();
            $table->string('slug')->nullable();
            $table->text('link')->nullable();
            $table->string('thumb')->nullable();
            $table->string('industry')->nullable();
            $table->string('due_date')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->integer('status')->default(0);
            $table->string('domain')->nullable();
            $table->integer('cr_coupon_id')->default(0);
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
        Schema::dropIfExists('crawler_coupons');
    }
}
