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
        Schema::create('roster_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('roster_days_id');
            $table->string('time');
            $table->unsignedBiginteger('employees_id');
            $table->unsignedBiginteger('reservations_id');

            $table->foreign('roster_days_id')
                ->references('id')
                ->on('roster_days')
                ->onDelete('cascade');

            $table->foreign('employees_id')
                ->references('id')
                ->on('employees')
                ->onDelete('no action');

            $table->foreign('reservations_id')
                ->references('id')
                ->on('reservations')
                ->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roster_times');
    }
};
