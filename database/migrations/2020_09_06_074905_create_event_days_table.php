<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDaysTable extends Migration
{

    public function up()
    {
        Schema::create('event_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreignId('day_id');
            $table->foreign('day_id')->references('id')->on('days');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_days');
    }
}
