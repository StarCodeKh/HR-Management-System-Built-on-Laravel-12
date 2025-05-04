<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permissions_name')->nullable();
            $table->timestamps();
        });

        DB::table('roles_permissions')->insert(
        [
            ['permissions_name' => 'Administrator'],
            ['permissions_name' => 'CEO'],
            ['permissions_name' => 'Manager'],
            ['permissions_name' => 'Team Leader'],
            ['permissions_name' => 'Accountant'],
            ['permissions_name' => 'Web Developer'],
            ['permissions_name' => 'Web Designer'],
            ['permissions_name' => 'HR'],
            ['permissions_name' => 'UI/UX Developer'],
            ['permissions_name' => 'SEO Analyst'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
