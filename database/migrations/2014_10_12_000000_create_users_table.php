<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName')->unique();
            $table->string('userFullName');
            $table->string('userNationality');
            $table->string('userEmail')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('userPassword');
            $table->string('userTarget')->nullable();
            $table->string('userQuestion');
            $table->string('userAnswer');
            $table->string('userImage');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
