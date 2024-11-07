<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificacionController extends Controller
{
    public function consultar()
    {
        $certificaciones = Competencia::orderBy('fechaRegistro', 'desc')->get();
        
        return view('pages.certificacion', compact('certificaciones'));
    }
}
