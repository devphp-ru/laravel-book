<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->bigInteger('book_id')->unsigned()->index()->comment('ID книги');
            $table->bigInteger('user_id')->default(0)->unsigned()->index()->comment('ID пользователя');
            $table->string('username')->comment('имя');
            $table->string('comment')->comment('комментарий');
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
        Schema::dropIfExists('comments');
    }
}
