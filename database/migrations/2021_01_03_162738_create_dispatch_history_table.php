<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dispatch_id')->unsigned();
            $table->foreign('dispatch_id')
                ->references('id')->on('dispatch')
                ->onDelete('cascade');
            $table->string('status');
            $table->string('city_dispatch');
            $table->string('city_destination');
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
        Schema::dropIfExists('dispatch_history');
    }
}
