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
        Schema::create('users_actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBiginteger('companies_actions_id');
            $table->unsignedBiginteger('users_categories_id');


            $table->foreign('companies_actions_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade');

            $table->foreign('users_categories_id')
                ->references('id')
                ->on('users_categories')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users___companies_categories__actions');
    }
};
