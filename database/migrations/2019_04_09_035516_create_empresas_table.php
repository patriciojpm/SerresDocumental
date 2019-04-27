<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('rut_emp',10);
            $table->string('nom_emp',200);
            $table->string('dir_emp',200);
            $table->string('com_emp',150);
            $table->string('gir_emp',150);
            $table->string('fon_emp',100);
            $table->string('mai_emp',130);
            $table->string('mutualidad',100);
            $table->string('especialidad',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
