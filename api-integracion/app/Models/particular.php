<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class particular extends Model
{
    use HasFactory;
    protected $table = 'particulares';
    public $timestamps = false;

     /**
     *  Define la relación de pertenencia a un tipo de usuarios.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
