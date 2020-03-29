<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEmpresasColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            //Primero borramos la columna a modificar
            if (Schema::hasColumn('empresas', 'localidad')) {
                $table->dropColumn('localidad');
            }
                        
            //Creamos la nueva columna, que sera un apuntador
            $table->unsignedBigInteger('localidad_id')->after('direccion');
            $table->foreign('localidad_id')->references('id')->on('localidads')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropForeign(['localidad_id']);

            $table->dropColumn('localidad_id');

            //Volvermos a dejar la columna que borramos en el UP
            $table->string('localidad',200)->nullable();

        });
    }
}
