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
        Schema::create('companies_actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBiginteger('companies_categories_id');
            $table->unsignedBiginteger('actions_id');

            
            $table->foreign('companies_categories_id')
                ->references('id')
                ->on('companies_categories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('companies_categories__actions');
    }
};
