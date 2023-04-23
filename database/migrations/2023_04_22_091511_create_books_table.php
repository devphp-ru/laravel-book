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
            $table->id()->comment('ID');
            $table->string('category_id')->index()->comment('ID категории');
            $table->string('author_id')->default(0)->index()->comment('ID автора');
            $table->string('slug')->unique()->comment('чпу');
            $table->string('title')->comment('название');
            $table->text('description')->nullable()->comment('описание');
            $table->bigInteger('rating')->default(0)->comment('рейтинг');
            $table->string('cover')->nullable()->comment('изображение');
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
