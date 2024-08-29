<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAgendamentosTable extends Migration
{
    public function up()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Alterando o tipo da coluna 'horario_inicio' para 'time'
            $table->time('horario_inicio')->change();
            // Alterando o tipo da coluna 'dia_semana' para 'string'
            $table->string('dia_semana')->change();
        });
    }

    public function down()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Revertendo as alterações se necessário
            $table->time('horario_inicio')->change();
            $table->tinyInteger('dia_semana')->change();
        });
    }
}
