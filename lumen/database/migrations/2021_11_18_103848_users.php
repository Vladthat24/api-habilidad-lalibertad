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
        //
        Schema::connection('mysql')->create('users',function(Blueprint $table){
            
            $table->engine='InnoDB';

            $table->bigIncrements('id')->usigned();
            $table->string('fisname',255);
            $table->string('lastname',255);
            $table->string('documents_type',10);
            $table->string('documents_number',30);
            $table->string('email',45)->unique();
            $table->string('password',255);
            $table->string('phone',30);
            $table->timestamps(); //crea los campos creat_at
            $table->softDeletes();//campo donde registra lo eliminado

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
