<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontratacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontratacions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->smallInteger('orden');

            //Obras
            $table->unsignedBigInteger('obra_id');
            $table->foreign('obra_id')->references('id')->on('obras')->onUpdate('cascade')->onDelete('cascade');

            //Contratante
            $table->unsignedBigInteger('contratante_id');
            $table->foreign('contratante_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');

            //Contratado
            $table->unsignedBigInteger('contratado_id');
            $table->foreign('contratado_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');

            //Nivel de subcontratacion
            $table->smallInteger('nivel');

            //Representante contratante
            $table->unsignedBigInteger('representante_contratante_id');
            $table->foreign('representante_contratante_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');

            //Representante contratado
            $table->unsignedBigInteger('representante_contratado_id');
            $table->foreign('representante_contratado_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::table('subcontratacions', function (Blueprint $table) {
            $table->dropForeign(['obra_id',
                                'contratante_id',
                                'contratado_id',
                                'representante_contratante_id',
                                'representante_contratado_id']);
            
        });

        Schema::dropIfExists('subcontratacions');
    }
}
