<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ayuntamiento extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     *  Define la relación de pertenencia a un tipo deusuarios.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /**
     *  Define la relación de pertenencia a un tipo de usuarios.
     */
    public function token()
    {
        return $this->belongsTo(Token::class, 'tokenVerification');
    }
}
