<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Invitations Table - id( unique, primary key, incremements )
        Schema::create('invitations', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('key' , 10)->unique();
            $table->integer('sent_by');
            $table->string('sent_to', 100);
            $table->integer('status');
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
        //
    }
}
