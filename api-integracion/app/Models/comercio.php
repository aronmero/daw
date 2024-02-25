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
    protected $hidden = ['pivot'];


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

    /**
     * Define la relación muchos a muchos con etiquetas.
     */
    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class, 'etiqueta_comercio', 'usuario_id', 'etiqueta_id');
    }

    /**
     * Define la relación muchos a muchos con comercios.
     */
    public function publicaciones()
    {
        return $this->belongsToMany(Publicacion::class, 'comercio_publicacion', 'publicacion_id', 'usuario_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($comercio) {
            $comercio->etiquetas()->detach();

            $comercio->publicaciones()->detach();
        });
    }

   
}
