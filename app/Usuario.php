<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'cpf',
        'data_nasc',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
    ];

    protected $hidden = [
       'remember_token',
    ];
}
