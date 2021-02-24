<?php

namespace App\Http\Controllers;

use App\TipoEndosos;

class TipoEndosoController extends Controller
{
    public function index()
    {
        return TipoEndosos::all();
    }
}
