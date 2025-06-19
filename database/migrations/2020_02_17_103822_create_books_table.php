<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('cover');
            $table->date('release_date')->nullable();
            $table->foreign('language_id')
                  ->references('id')->on('languages')
                  ->onDelete('cascade');
            $table->integer('language_id');
            $table->string('status');
            $table->integer('pages');
            $table->integer('category_id');
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->integer('creator_id');
            $table->foreign('creator_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->boolean('translated');
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
        Schema::dropIfExists('books');
    }
}
