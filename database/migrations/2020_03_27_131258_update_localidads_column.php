<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLocalidadsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('localidads', function (Blueprint $table) {
            
            if (Schema::hasColumn('localidads', 'provincia_id')) {
                $table->dropColumn('provincia_id');
            }
            //Creamos la nueva columna, que sera un apuntador
            $table->unsignedBigInteger('provincia_id')->after('nombre')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::table('obras', function (Blueprint $table) {
            
            if (Schema::hasColumn('obras', 'localidad_id')) {
                $table->dropColumn('localidads_id');
            }
            //Creamos la nueva columna, que sera un apuntador
            $table->unsignedBigInteger('localidad_id')->after('direccion')->nullable();
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
        Schema::table('localidads', function (Blueprint $table) {
            //Liquidamos la relación
            $table->dropForeign(['provincia_id']);
            //Borramos la columna creada en el UP
            $table->dropColumn('provincia_id');
        });

        Schema::table('obras', function (Blueprint $table) {
            //Liquidamos la relación
            $table->dropForeign(['localidad_id']);
            //Borramos la columna creada en el UP
            $table->dropColumn('localidad_id');
        });

    }
}
