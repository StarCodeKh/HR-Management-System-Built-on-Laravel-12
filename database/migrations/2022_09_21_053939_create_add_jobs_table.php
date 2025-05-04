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
        Schema::create('add_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable();
            $table->string('job_location')->nullable();
            $table->string('no_of_vacancies')->nullable();
            $table->string('experience')->nullable();
            $table->string('age')->nullable();
            $table->string('salary_from')->nullable();
            $table->string('salary_to')->nullable();
            $table->string('job_type')->nullable();
            $table->string('status')->nullable();
            $table->string('start_date')->nullable();
            $table->string('expired_date')->nullable();
            $table->longText('description')->nullable();
            $table->longText('count')->nullable();
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
        Schema::dropIfExists('add_jobs');
    }
};
