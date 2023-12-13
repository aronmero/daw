<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function mostrarActividades()
    { 
       $actividades=Actividad::all();
       return view("vista",['actividades' => $actividades]);
    }
}
