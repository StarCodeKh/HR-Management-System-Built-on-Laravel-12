<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceIndicatorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_indicator_lists', function (Blueprint $table) {
            $table->id();
            $table->string('per_name_list')->nullable();
            $table->timestamps();
        });

        DB::table('performance_indicator_lists')->insert(
        [
            ['per_name_list' => 'None'],
            ['per_name_list' => 'Beginner'],
            ['per_name_list' => 'Intermediate'],
            ['per_name_list' => 'Advanced'],
            ['per_name_list' => 'Expert / Leader'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_indicator_lists');
    }
}
