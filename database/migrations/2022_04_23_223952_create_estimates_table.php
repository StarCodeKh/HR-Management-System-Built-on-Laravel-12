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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->string('estimate_number');
            $table->string('client')->nullable();
            $table->string('project')->nullable();
            $table->string('email')->nullable();
            $table->string('tax')->nullable();
            $table->string('client_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('estimate_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('total')->nullable();
            $table->string('tax_1')->nullable();
            $table->string('discount')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('other_information')->nullable();
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
        Schema::dropIfExists('estimates');
    }
};
