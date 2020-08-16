<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle_book', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circle_id');
            $table->foreignId('book_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location');
            $table->dateTime('meet_up_date');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('circle_book');
    }
}
