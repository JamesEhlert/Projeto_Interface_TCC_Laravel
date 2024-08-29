<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSensorsTable extends Migration
{
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            // Remover as colunas que não serão mais utilizadas
            $table->dropColumn('identificador');
            $table->dropColumn('nome');
            
            // Adicionar a nova coluna "descrição"
            $table->string('descricao')->after('id');
        });
    }

    public function down()
    {
        Schema::table('sensors', function (Blueprint $table) {
            // Adicionar novamente as colunas removidas caso seja necessário reverter
            $table->string('identificador')->unique();
            $table->string('nome');
            
            // Remover a coluna "descrição"
            $table->dropColumn('descricao');
        });
    }
}
