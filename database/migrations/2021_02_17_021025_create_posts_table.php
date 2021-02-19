<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id')->unsigned();
            $table->text('tittle');
            $table->text('summary');
            $table->text('image');
            $table->text('description');
            $table->text('otra');
            $table->timestamps();

           // $table->foreign('categoria_id')->references('id')->on('categorias');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
