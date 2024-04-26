<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function respuestaHTTP($menssage,$code,$status=false) {
        return response()->json([
            'status' => $status,
            'message' => $menssage,
        ], $code);
    }
}
