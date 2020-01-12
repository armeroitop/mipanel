<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre',50);
            $table->string('apellidos',50);

           // $table->string('nacionalidad',20);
            //Creamos la nueva columna, que sera un apuntador
            //$table->unsignedBigInteger('nacionalidad_id');
           // $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->onUpdate('cascade')->onDelete('cascade');

            $table->string('dni',20);
            $table->date('fecha_nacimiento');

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
        /* Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign(['nacionalidad_id']);
        }); */

        Schema::dropIfExists('personas');
    }
}
