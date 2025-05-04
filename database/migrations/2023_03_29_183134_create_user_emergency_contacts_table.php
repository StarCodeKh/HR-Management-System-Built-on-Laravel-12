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
        Schema::create('user_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name_primary')->nullable();
            $table->string('relationship_primary')->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('phone_2_primary')->nullable();
            $table->string('name_secondary')->nullable();
            $table->string('relationship_secondary')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->string('phone_2_secondary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_emergency_contacts');
    }
};
