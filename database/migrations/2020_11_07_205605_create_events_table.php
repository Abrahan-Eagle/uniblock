<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            
            $table->id();

            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('direccion')->nullable();
            $table->date('date_activi')->nullable();
            $table->date('last_activity')->nullable();
            $table->enum('activity', [1, 0])->default(1);
            $table->enum('statusx', [1, 0])->default(1);

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
        Schema::dropIfExists('events');
    }
}
