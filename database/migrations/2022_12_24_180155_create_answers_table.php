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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer')->nullable();
            $table->timestamps();
        });
        DB::table('answers')->insert([
            ['answer' => 'A'],
            ['answer' => 'B'],
            ['answer' => 'C'],
            ['answer' => 'D'],
            ['answer' => 'E']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
