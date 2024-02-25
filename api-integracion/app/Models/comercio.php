<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comercio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'usuario_id',
        'categoria_id',
        'direccion',
        'descripcion',
        'verificado'
    ];

    protected $attributes = [
        'verificado' => false,
    ];
    

    /**
     *  Define la relación de pertenencia a un tipo de usuarios.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    /**
     *  Define la relación de pertenencia a un tipo de categoria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    
}
