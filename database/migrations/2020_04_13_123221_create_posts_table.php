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

            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('sponsor_id')->nullable();
            $table->unsignedBigInteger('cities_id')->nullable();
            

            $table->string('title');
            $table->string('slug')-> unique();

            $table->mediumText('excerpt')->nullable();
            $table->text('content')->nullable();
            
            $table->string('direccion')->nullable();
            $table->timestamp('date_activi')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->enum('activity', ['ON', 'OFF'])->default('ON');

            $table->enum('statusx', ['PUBLISHED', 'DRAFT' ])->default('DRAFT');
            $table->enum('level', ['blog', 'sermon', 'event' ])->default('blog');
            $table->bigInteger('views')->default(0);
            $table->string('img', 128)->nullable();
            $table->string('url_video')->nullable();

            $table->timestamps();

            //Relation            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sponsor_id')->references('id')->on('sponsor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');

           
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
