<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoEstadoLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_estado_laboral', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('contrato_id');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('estado_laboral_id');
            $table->foreign('estado_laboral_id')->references('id')->on('estado_laborals')->onUpdate('cascade')->onDelete('cascade');

            $table->date('fecha');

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
        Schema::table('contrato_estado_laboral', function (Blueprint $table) {
            $table->dropForeign(['contrato_id']);
            $table->dropForeign(['estado_laboral_id']);           
        });
        Schema::dropIfExists('contrato_estado_laboral');
    }
}
