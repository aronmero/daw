<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;
    //Campos esperados 
   // protected $fillable = ['nombre', 'idCategoria'];
   
   //Campos que no queremos
    protected $guarded=['token'];
}
