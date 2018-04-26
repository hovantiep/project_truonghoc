<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id'); // khoa ngoai
            $table->unsignedInteger('user_id'); // khoa ngoai
            $table->string('title',255);
            $table->string('alias',255);
            $table->string('intro',255);
            $table->longText('content');
            $table->string('image',255)->nullable();
            $table->boolean('highlights')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actives');
    }
}
