<?php

namespace App\Http\Controllers;

use App\TipoRiesgo;
use Illuminate\Http\Request;
use App\Http\Resources\TipoRiesgo as TiporiesgosResource;


class TipoRiesgoController extends Controller
{
    public function index()
    {
        return TipoRiesgo::all();
    }
}
