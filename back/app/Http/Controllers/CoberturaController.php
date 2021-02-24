<?php

namespace App\Http\Controllers;

use App\Coberturas;
use Illuminate\Http\Request;
use App\Http\Resources\Cobertura as CoberturasResource;



class CoberturaController extends Controller
{
    public function index()
    {
        return Coberturas::all();
    }


    public function show($id)
    {
        return Coberturas::findOrFail($id);
    }

    public function indexFiltrado($compania_id)
    {
        return Coberturas::where('compania_id', $compania_id)->get();
    }


    public function store(Request $request)
    {
        $this->validate($request, []);

        $cobertura = Coberturas::create([
            'nombre' => $request->input('nombre'),
            'compania_id' => $request->input('compania_id'),
            'antiguedad' => $request->input('antiguedad'),
            'todo_riesgo' => $request->input('todo_riesgo'),
            'franquicia' => $request->input('franquicia'),
            'activa' => $request->input('activa'),
            'ajuste' => $request->input('ajuste'),
            'detalle' => $request->input('detalle'),
        ]);

        return (['message' => 'guardado']);
    }

    public function update(Request $request, $id)
    {
        $cobertura = Coberturas::find($id);
        $cobertura->update([
            'nombre' => $request->input('nombre'),
            'compania_id' => $request->input('compania_id'),
            'antiguedad' => $request->input('antiguedad'),
            'todo_riesgo' => $request->input('todo_riesgo'),
            'franquicia' => $request->input('franquicia'),
            'activa' => $request->input('activa'),
            'ajuste' => $request->input('ajuste'),
            'detalle' => $request->input('detalle'),
        ]);
    }

    public function destroy($id)
    {
        $cobertura = Coberturas::find($id);

        $cobertura->delete();

        return ['message' => 'Eliminado'];
    }
}
