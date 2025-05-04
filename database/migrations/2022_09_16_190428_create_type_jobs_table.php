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
        Schema::create('type_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name_type_job')->nullable();
            $table->timestamps();
        });
        DB::table('type_jobs')->insert([
            ['name_type_job' => 'Full Time'],
            ['name_type_job' => 'Part Time'],
            ['name_type_job' => 'Internship'],
            ['name_type_job' => 'Temporary'],
            ['name_type_job' => 'Remote'],
            ['name_type_job' => 'Others'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_jobs');
    }
};
