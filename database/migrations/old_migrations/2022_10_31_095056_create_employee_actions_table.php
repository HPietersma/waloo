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
        Schema::create('employee_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('employee_categories_id');
            $table->unsignedBiginteger('actions_id');

            $table->foreign('employee_categories_id')
                ->references('id')
                ->on('employee_categories')
                ->onDelete('no action');

            $table->foreign('actions_id')
                ->references('id')
                ->on('actions')
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
        Schema::dropIfExists('employee_actions');
    }
};
