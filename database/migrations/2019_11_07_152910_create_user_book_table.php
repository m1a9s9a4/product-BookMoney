<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            $table->unsignedSmallInteger('status_id');
            $table->timestamps();

            $table->unique(['user_id', 'book_id']);

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table
                ->foreign('book_id')
                ->references('id')
                ->on('books');

            $table
                ->foreign('status_id')
                ->references('id')
                ->on('user_book_status_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_books');
    }
}
