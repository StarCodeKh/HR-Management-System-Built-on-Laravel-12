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
        Schema::create('estimates_adds', function (Blueprint $table) {
            $table->id();
            $table->string('estimate_number')->nullable();
            $table->string('item')->nullable();
            $table->string('description')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('qty')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('estimates_adds');
    }
};
