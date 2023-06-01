<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->integer('reply_id')->default(0);

            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            $table->string('img')->default('person_2.jpg');
            $table->enum('statusx', ['PUBLISHED', 'DRAFT' ])->default('PUBLISHED');
            
            $table->timestamps();

            //Relation
 
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')
            ->onUpdate('cascade');
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
