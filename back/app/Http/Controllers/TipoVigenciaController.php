<?php

namespace App\Http\Controllers;

use App\TipoVigencia;
use Illuminate\Http\Request;
use App\Http\Resources\TipoVigencia as TipoVigenciasResource;

class TipoVigenciaController extends Controller
{
    public function index()
    {
        return TipoVigencia::all();
    }
}
