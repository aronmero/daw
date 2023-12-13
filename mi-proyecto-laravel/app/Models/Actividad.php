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
}
