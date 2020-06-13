<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bio')->nullable();
            $table->string('about')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('gh')->nullable();
            $table->integer('wapp')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pic')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
