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
        Schema::create('companies_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('companies_id');
            $table->unsignedbigInteger('categories_id');

            $table->foreign('companies_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('companies_categories');
    }
};
