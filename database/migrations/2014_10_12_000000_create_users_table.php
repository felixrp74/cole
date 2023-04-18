<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('dni')->nullable();
            $table->string('name'); 
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->string('usuario')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tipo')->nullable();

            // categoria para escuelas
            // ingenieria-mecanica
            // ingenieria-electronica
            // ingenieria-sistemas
            $table->string('tipo_usuario')->nullable(); //docente, estudiante, admin
            $table->integer('identificador')->nullable();
            $table->integer('identificador_estudiante')->nullable(); // por id 
            $table->integer('identificador_docente')->nullable(); // por id 


            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
