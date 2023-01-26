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
        Schema::create('employee_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('employees_id');
            $table->unsignedBiginteger('companies_categories_id');

            $table->foreign('employees_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('companies_categories_id')
                ->references('id')
                ->on('companies_categories')
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
        Schema::dropIfExists('employee_categories');
    }
};
