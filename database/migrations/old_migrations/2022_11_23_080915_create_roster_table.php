<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roster', function (Blueprint $table) {
            $table->id();
            $table->unsingedBigInteger('user_id');
            $table->string('date');
            $table->string('timestamp');
            $table->unsingedBigInteger('reservations_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('reservations_id')
                ->references('id')
                ->on('reservations')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roster');
    }
};
