<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('comment_id')->nullable();
            
            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            $table->string('img')->default('person_2.jpg');
            $table->enum('statusx', ['PUBLISHED', 'DRAFT' ])->default('PUBLISHED');
            
            $table->timestamps();

            //Relation
 
            $table->foreign('comment_id')->references('id')->on('comment')->onDelete('cascade')
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
        Schema::dropIfExists('reply');
    }
}
