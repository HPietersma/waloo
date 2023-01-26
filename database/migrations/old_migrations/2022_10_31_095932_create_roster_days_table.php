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
        Schema::create('roster_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('companies_id');
            $table->string('date');

            $table->foreign('companies_id')
                ->references('id')
                ->on('companies_categories')
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
        Schema::dropIfExists('roster_days');
    }
};
