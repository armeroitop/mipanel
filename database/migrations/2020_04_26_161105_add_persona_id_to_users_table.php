<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonaIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            if (Schema::hasColumn('users', 'persona_id')) {
                $table->dropColumn('persona_id');
            }
            $table->unsignedBigInteger('persona_id')->after('id')->nullable();
            $table->unique('persona_id', 'users_persona_id_unique'); 

            $table->foreign('persona_id')->references('id')->on('personas')
                ->onDelete('set null')
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
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropUnique('users_persona_id_unique');
            //Liquidamos la relación
            $table->dropForeign(['persona_id']);
            //Borramos la columna creada en el UP
            $table->dropColumn('persona_id');
        });
    }
}
