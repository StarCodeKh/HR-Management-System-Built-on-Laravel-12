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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('leave_type')->nullable();
            $table->string('remaining_leave')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('leave_date')->nullable();
            $table->string('leave_day')->nullable();
            $table->string('number_of_day')->nullable();
            $table->string('reason')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
