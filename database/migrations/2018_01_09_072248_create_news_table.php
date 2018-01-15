<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id'); // khoa ngoai
            $table->string('title',255);
            $table->string('alias',255);
            $table->smallInteger('order')->default(100);
            $table->string('intro',255);
            $table->longText('content');
            $table->string('keywords',255)->nullable();
            $table->string('image',255)->nullable();
            $table->boolean('highlights')->default('false');
            $table->unsignedInteger('views')->default(0);
            $table->string('strAttr')->nullable();
            $table->integer('intAttr')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
