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
            $table->id();
            /* relacion 1 a 1 con foto de perfil */
            $table->unsignedBigInteger('photo_id')->unique();

            $table->foreign('photo_id')
                ->references('id')
                ->on('photos')
                ->onUpdate('cascade');

            $table->string('documento');
            $table->string('nombre');
            $table->string("perfil");
            $table->string("bodega");
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
