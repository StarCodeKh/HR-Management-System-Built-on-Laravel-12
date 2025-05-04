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
        Schema::create('leave_information', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type')->nullable();
            $table->string('leave_days')->nullable();
            $table->string('year_leave')->nullable();
            $table->timestamps();
        });

        DB::table('leave_information')->insert([
            ['leave_type' => 'Medical Leave'  ,'leave_days'     => '04','year_leave' => date('Y')],
            ['leave_type' => 'Casual Leave'   ,'leave_days'     => '08','year_leave' => date('Y')],
            ['leave_type' => 'Sick Leave'     ,'leave_days'     => '05','year_leave' => date('Y')],
            ['leave_type' => 'Annual Leave'   ,'leave_days'     => '12','year_leave' => date('Y')],
            ['leave_type' => 'Use Leave'      ,'leave_days'     => '09','year_leave' => date('Y')],
            ['leave_type' => 'Remaining Leave','leave_days'     => '18','year_leave' => date('Y')],
            ['leave_type' => 'Total Leave Balance','leave_days' => '00','year_leave' => date('Y')]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_information');
    }
};
