<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('customer_experience')->nullable();
            $table->string('marketing')->nullable();
            $table->string('management')->nullable();
            $table->string('administration')->nullable();
            $table->string('presentation_skill')->nullable();
            $table->string('quality_of_Work')->nullable();
            $table->string('efficiency')->nullable();
            $table->string('integrity')->nullable();
            $table->string('professionalism')->nullable();
            $table->string('team_work')->nullable();
            $table->string('critical_thinking')->nullable();
            $table->string('conflict_management')->nullable();
            $table->string('attendance')->nullable();
            $table->string('ability_to_meet_deadline')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_appraisals');
    }
}
