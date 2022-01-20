<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('parent_id')->default(0);
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug',255)->nullable()->unique();
            $table->integer('status')->default(0);
            $table->string('link')->nullable();
            $table->string('domain')->nullable();
            $table->integer('cr_menu_id')->default(0);
            $table->integer('cr_total_page')->default(0);
            $table->integer('cr_page_process')->default(1);

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
        Schema::dropIfExists('crawler_menus');
    }
}
