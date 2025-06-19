<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tag', function (Blueprint $table) {
            $table->integer('book_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->foreign('tag_id')->references('id')->on('tags')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tag');
    }
}
