<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('customer_eperience')->nullable();
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
        Schema::dropIfExists('performance_indicators');
    }
}
