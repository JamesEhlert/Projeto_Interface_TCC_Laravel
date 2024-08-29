<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'sensor_id',
        'horario_inicio',
        'duracao',
        'dia_semana',
    ];

    // Define o tipo de dado para o campo 'dia_semana'
    protected $casts = [
        'dia_semana' => 'array', // Isso garante que 'dia_semana' seja tratado como um array ao recuperar do banco de dados
    ];

    // Se você quiser formatar a duração para um formato legível
    public function getDuracaoFormattedAttribute()
    {
        $duration = \Carbon\CarbonInterval::seconds($this->duracao)->cascade()->forHumans();
        return $duration;
    }
}
