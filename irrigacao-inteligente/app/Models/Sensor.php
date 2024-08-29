<?php

// app/Models/Sensor.php

// app/Models/Sensor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos
    protected $fillable = [
        'descricao',
        'umidade_minima',
        'umidade_maxima',
    ];

    // Define a tabela associada ao modelo
    protected $table = 'sensors';

    // Definindo o relacionamento "hasMany" com o modelo Agendamento
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
