<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdenIdToSubcontratationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcontratacions', function (Blueprint $table) {   
            $table->unsignedBigInteger('orden')->nullable()->change();
            
            $table->foreign('orden')->references('id')->on('subcontratacions')
            ->onDelete('restrict')
            ->onUpdate('cascade'); 
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
                       
            $table->dropForeign(['orden']);            
        });
    }
}
