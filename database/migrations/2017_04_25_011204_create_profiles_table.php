<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_title')->comment('profile title');
            $table->string('pro_thumb')->default('')->comment('profile thumb image url');
            $table->string('pro_description')->default('')->comment('profile descriptions');
            $table->text('pro_photo')->comment('profile panorama photo url');
            $table->enum('pro_type',['1','2','3'])->default('1')->comment('profile type');
            $table->string('pro_bgm')->default('')->comment('profile background music url');
            $table->integer('user_id')->unsigned()->index()->comment('user id foreign key');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('featured')->default(0)->comment('is featured profile');
            $table->integer('favorite')->unsigned()->default(0)->comment('favorite count');
            $table->boolean('deleted')->comment('profile is deleted');
            $table->integer('view')->unsigned()->default(0)->comment('profile viewed');
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
        Schema::dropIfExists('profiles');
    }
}
