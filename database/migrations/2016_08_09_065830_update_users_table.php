<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Update user table with role(smallint unsigned), status(smallint unsigned), invite_id(smalint unsigned), group_id (smallint unsigned)
        Schema::table('users', function ($table) {
            $table->integer('role')->unsigned()->after('school_slug');
            $table->integer('status')->unsigned()->after('role');
            $table->integer('invite_id')->unsigned()->after('status');
            $table->integer('group_id')->unsigned()->after('invite_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
