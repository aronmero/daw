<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    /*Esta linea se debe a que Laravel entiende las tablas en plural como "s" al final,
     asi que seria "Actividads" eso genera un problema si no se cambia el nombre de la tabla aqui o en la migracion
     */
    protected $table = 'actividades';
    protected $guarded = ['token'];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'actividades_grupos', 'actividad_id', 'grupo_id')
        ->select(['id', 'nombre']);
    }

    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'actividades_profesores', 'actividad_id', 'profesor_id');
    }

    protected static function booted()
    {
        static::deleting(function ($actividad) {
            $actividad->grupos()->detach();
            $actividad->profesores()->detach();
        });
    }

    protected $hidden = ['created_at', 'updated_at'];
    public function getGruposAttribute($value)
    {
        if ($value) {
            return $value->map(function ($grupo) {
                unset($grupo['pivot']);
                return $grupo;
            });
        }
        return $value;
    }
    
}
