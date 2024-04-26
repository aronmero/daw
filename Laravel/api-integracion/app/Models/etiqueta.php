<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiqueta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];
    /**
     * Define la relación muchos a muchos con comercios.
     */
    public function comercios()
    {
        return $this->belongsToMany(Comercio::class, 'etiqueta_comercio', 'etiqueta_id', 'usuario_id');
    }

    /**
     * Define la relación muchos a muchos con publicaciones.
     */
    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'etiqueta_publicacion', 'etiqueta_id', 'publicacion_id');
    }

    protected static function booted()
    {
        static::deleting(function ($etiqueta) {
            $etiqueta->comercios()->detach();
            $etiqueta->publicaciones()->detach();
        });
    }
}
