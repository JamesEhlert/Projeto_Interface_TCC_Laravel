<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDiaSemanaToJsonInAgendamentosTable extends Migration
{
    public function up()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Alterar o campo para JSON
            $table->json('dia_semana')->change();
        });
    }

    public function down()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Reverter para LONGTEXT
            $table->longText('dia_semana')->change();
        });
    }
}
