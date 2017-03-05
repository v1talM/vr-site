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
            $table->string('pro_title')->comment('product title');
            $table->string('pro_thumb')->default('')->comment('product thumb image url');
            $table->text('pro_photo')->comment('product panorama photo url');
            $table->string('pro_bgm')->default('')->comment('product background music url');
            $table->integer('user_id')->unsigned()->index()->comment('user id foreign key');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('featured')->default(0)->comment('is featured product');
            $table->integer('favorite')->default(0)->comment('favorite count');
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
