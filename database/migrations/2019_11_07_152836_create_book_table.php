<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
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
            $table->text('title');
            $table->text('publisher')->comment('出版社');
            $table->text('author')->comment('著者');
            $table->text('url');
            $table->text('image_url');
            $table->text('code')->comment('ISBN コード');
            $table->timestamps();

            $table->index(['title', 'code']);
            $table->unique('code');
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
