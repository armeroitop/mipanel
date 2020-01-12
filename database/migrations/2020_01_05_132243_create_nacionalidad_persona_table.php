<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNacionalidadPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalidad_persona', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::table('nacionalidad_persona', function (Blueprint $table) {
            $table->dropForeign(['nacionalidad_id']);
            $table->dropForeign(['persona_id']);

        });


        Schema::dropIfExists('nacionalidad_persona');
    }
}
