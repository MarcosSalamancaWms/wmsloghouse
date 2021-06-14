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


            $table->string('username')->unique();
            $table->string('slug')->unique();
            $table->string('email')->unique();
            /* $table->timestamp('email_verified_at')->nullable(); */
            $table->string('password');

            /* relacion 1 a 1 con el perfil del usuario*/
            $table->unsignedBigInteger('profile_id')->unique();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            /* relacion 1 a 1 con el estado y ultimo login del Usuario */
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onUpdate('cascade');

            /* relacion 1 a 1 con el role del Usuario */
            /* $table->foreignId('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade'); */

            $table->timestamp('last_session_started')->default(null)->nullable();/* Ultima fecha de Inicio de Sesion */
            $table->timestamp('last_session_completed')->default(null)->nullable();/* Ultima fecha de Cierre de Sesion */

            /* $table->rememberToken(); */

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
