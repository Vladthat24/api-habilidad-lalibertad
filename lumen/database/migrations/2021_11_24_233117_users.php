<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creando la base de datos users
        Schema::create('users',function (Blueprint $table){
            $table->engine='InnoDB';
          
            $table->bigIncrements('id')->unsigned();
            $table->string('firstname',255);
            $table->string('lastname',255);
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->timestamps();
            $table->softDeletes();
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
