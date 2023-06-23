<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('total_working_days');
            $table->integer('total_leave_taken');
            $table->integer('overtime');
            $table->double('total_salary_made')->default(0);
            $table->tinyInteger('is_salary_calculated')->default(0);
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
