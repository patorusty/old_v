<?php

namespace App\Http\Controllers;

use App\CodigoProductor;
use Illuminate\Http\Request;
use App\Http\Resources\CodigoProductor as CodigoProductorsResource;



class CodigoProductorController extends Controller
{
    public function index()
    {
        return CodigoProductor::with(['productores', 'codigo_organizador'])->get();
    }
    public function show($id)
    {
        return CodigoProductor::findOrFail($id);
    }

    public function indexFiltrado($compania_id)
    {
        return CodigoProductor::with(['productores', 'codigo_organizador'])->where('compania_id', $compania_id)->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, []);

        $codigo_productores = CodigoProductor::create([
            'codigo_productor' => $request->input('codigo_productor'),
            'codigo_organizador_id' => $request->input('codigo_organizador_id'),
            'productor_id' => $request->input('productor_id'),
            'compania_id' => $request->input('compania_id'),
            'activo' => $request->input('activo'),
        ]);

        return (['message' => 'guardado']);
    }

    public function update(Request $request, $id)
    {
        $codigo_productores = CodigoProductor::find($id);
        $codigo_productores->update([
            'codigo_productor' => $request->input('codigo_productor'),
            'codigo_organizador_id' => $request->input('codigo_organizador_id'),
            'productor_id' => $request->input('productor_id'),
            'compania_id' => $request->input('compania_id'),
            'activo' => $request->input('activo'),
        ]);
    }

    public function searchCP()
    {
        if ($search = \Request::get('q')) {
            $cp = CodigoProductor::where('codigo_productor', $search)->get();
        }
        return CodigoProductorsResource::collection($cp);
    }

    public function destroy($id)
    {
        $codigo_productores = CodigoProductor::find($id);

        $codigo_productores->delete();

        return ['message' => 'Eliminado'];
    }
}
