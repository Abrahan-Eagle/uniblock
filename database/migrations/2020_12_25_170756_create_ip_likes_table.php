<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_likes', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('like_id')->nullable();
            
            $table->string('REMOTE_ADDR_like')->default(0);
            $table->string('REMOTE_ADDR_dislike')->default(0);
            
            $table->timestamps();

            //Relation
 
            $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade')
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
        Schema::dropIfExists('ip_likes');
    }
}
