<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigoEmpresaObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigo_empresa_obra', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('obra_id');

            //Relaciones
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('obra_id')->references('id')->on('obras');

            $table->string('codigo');


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
        Schema::table('codigo_empresa_obra', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['obra_id']);           
        });
        
        Schema::dropIfExists('codigo_empresa_obra');
    }
}
