<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_lists', function (Blueprint $table) {
            $table->id();
            $table->string('permission_name')->nullable();
            $table->string('read')->nullable();
            $table->string('write')->nullable();
            $table->string('create')->nullable();
            $table->string('delete')->nullable();
            $table->string('import')->nullable();
            $table->string('export')->nullable();
        });

        DB::table('permission_lists')->insert([
            ['permission_name' => 'Holidays','read'      => 'Y','write' => 'Y','create' => 'Y','delete' => 'Y','import' => 'Y','export' => 'N'],
            ['permission_name' => 'Leaves','read'        => 'Y','write' => 'Y','create' => 'Y','delete' => 'N','import' => 'N','export' => 'N'],
            ['permission_name' => 'Clients','read'       => 'Y','write' => 'Y','create' => 'Y','delete' => 'N','import' => 'N','export' => 'N'],
            ['permission_name' => 'Projects','read'      => 'Y','write' => 'N','create' => 'Y','delete' => 'N','import' => 'N','export' => 'N'],
            ['permission_name' => 'Tasks','read'         => 'Y','write' => 'Y','create' => 'Y','delete' => 'Y','import' => 'N','export' => 'N'],
            ['permission_name' => 'Chats','read'         => 'Y','write' => 'Y','create' => 'Y','delete' => 'Y','import' => 'N','export' => 'N'],
            ['permission_name' => 'Assets','read'        => 'Y','write' => 'Y','create' => 'Y','delete' => 'Y','import' => 'N','export' => 'N'],
            ['permission_name' => 'Timing Sheets','read' => 'Y','write' => 'Y','create' => 'Y','delete' => 'Y','import' => 'N','export' => 'N'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_lists');
    }
}
