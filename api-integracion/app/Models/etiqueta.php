<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiqueta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = ['pivot'];
    /**
     * Define la relación muchos a muchos con comercios.
     */
    public function comercios()
    {
        return $this->belongsToMany(Etiqueta::class, 'etiqueta_comercio', 'usuario_id', 'etiqueta_id');
    }

    /**
     * Define la relación muchos a muchos con publicaciones.
     */
    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'comercio_publicacion', 'usuario_id', 'publicacion_id');
    }

    protected static function booted()
    {
        static::deleting(function ($etiqueta) {
            $etiqueta->comercios()->detach();
            $etiqueta->publicaciones()->detach();
        });
    }
}
