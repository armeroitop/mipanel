<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSubcontratationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcontratacions', function (Blueprint $table) {           
            //Representante contratante
            $table->unsignedBigInteger('representante_contratante_id')->nullable()->change();            

            //Representante contratado
            $table->unsignedBigInteger('representante_contratado_id')->nullable()->change();           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
