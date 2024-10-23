<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tạo bảng categories trước
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');//category's id
            $table->string("name");
            $table->longText("description");
            $table->timestamps();
        });

        // Sau đó tạo bảng books
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer('price');
            $table->longText("description");
            $table->timestamps();

            // Khóa ngoại tham chiếu đến bảng categories
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('categories');
    }
};
