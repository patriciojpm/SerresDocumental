<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LlaveforaneaAUsuariosParainspector extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudeprocesos', function (Blueprint $table) {
            $table->foreign('inspector_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudeprocesos', function (Blueprint $table) {
            $table->dropForeign('solicitudeprocesos_inspector_id_foreign');
        });
    }
}
