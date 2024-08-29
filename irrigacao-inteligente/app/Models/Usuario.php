<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Defina os atributos que são atribuíveis em massa
    protected $fillable = [
        'nome', 'email', 'cpf', 'senha',
    ];

    // Especifique os atributos que devem ser ocultados para arrays
    protected $hidden = [
        'senha', 'remember_token',
    ];

    // Defina o nome da coluna de senha
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
