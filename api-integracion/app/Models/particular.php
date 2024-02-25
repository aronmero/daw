<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class particular extends Model
{
    use HasFactory;
    protected $table = 'particulares';
    public $timestamps = false;
    protected $primaryKey = 'usuario_id';


    protected $fillable = [
        'usuario_id',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'fecha_nacimiento',
    ];
    
     /**
     *  Define la relación de pertenencia a un tipo de usuarios.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
}
