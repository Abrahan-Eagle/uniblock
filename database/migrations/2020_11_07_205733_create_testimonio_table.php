<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonio', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('url_video')->nullable();
            $table->enum('statux', [1, 0])->default(1);

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
        Schema::dropIfExists('testimonio');
    }
}
