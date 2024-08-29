<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Alterando o tipo de coluna 'horario_inicio' para TIME (já está correto, mas mantemos a alteração para garantir)
            $table->time('horario_inicio')->change();

            // Alterando o tipo de coluna 'dia_semana' para TINYINT (já está correto, mas mantemos a alteração para garantir)
            $table->tinyInteger('dia_semana')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            // Revertendo as alterações (se necessário)
            // Se precisar voltar ao tipo original, remova ou ajuste conforme necessário
        });
    }
}

