<?php

namespace App\Http\Controllers;

use App\Polizas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Poliza as PolizasResource;


class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Polizas::with(['codigo_productor', 'estado_polizas', 'clientes', 'companias', 'tipo_vigencias'])->get();
    }

    public function numeroDeSolicitud()
    {
        $poliza = DB::table('polizas')->orderBy('numero_solicitud', 'DESC')->take(1)->get();
        return $poliza[0];
    }

    public function chequeoRenovada($poliza_actual)
    {
        return Polizas::where('renueva_numero', $poliza_actual)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $poliza = Polizas::create([
            'cliente_id' => $request->input('cliente_id'),
            'compania_id' => $request->input('compania_id'),
            'codigo_productor_id' => $request->input('codigo_productor_id'),
            'tipo_riesgo_id' => $request->input('tipo_riesgo_id'),
            'numero_solicitud' => $request->input('numero_solicitud'),
            'numero' => $request->input('numero'),
            'estado_poliza_id' => $request->input('estado_poliza_id'),
            'renueva_numero' => $request->input('renueva_numero'),
            'tipo_vigencia_id' => $request->input('tipo_vigencia_id'),
            'vigencia_dias' => $request->input('vigencia_dias'),
            'vigencia_desde' => $request->input('vigencia_desde'),
            'vigencia_hasta' => $request->input('vigencia_hasta'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            'fecha_emision' => $request->input('fecha_emision'),
            'fecha_recepcion' => $request->input('fecha_recepcion'),
            'fecha_entrega_correo' => $request->input('fecha_entrega_correo'),
            'fecha_entrega_original' => $request->input('fecha_entrega_original'),
            'fecha_entrega_email' => $request->input('fecha_entrega_email'),
            'premio' => $request->input('premio'),
            'prima' => $request->input('prima'),
            'plan_pago' => $request->input('plan_pago'),
            'cantidad_cuotas' => $request->input('cantidad_cuotas'),
            'forma_pago_id' => $request->input('forma_pago_id'),
            'detalle_medio_pago' => $request->input('detalle_medio_pago'),
            'comision' => $request->input('comision'),
            'descuento' => $request->input('descuento'),
            'archivada' => $request->input('archivada'),
        ]);

        return $poliza;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($numero_solicitud)
    {
        $poliza =  Polizas::where('numero_solicitud', $numero_solicitud)->with(['codigo_productor.productores', 'estado_polizas', 'clientes', 'companias', 'tipo_vigencias'])->get();
        return $poliza[0];
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poliza = Polizas::find($id);
        $poliza->update([
            'cliente_id' => $request->input('cliente_id'),
            'compania_id' => $request->input('compania_id'),
            'codigo_productor_id' => $request->input('codigo_productor_id'),
            'tipo_riesgo_id' => $request->input('tipo_riesgo_id'),
            'numero_solicitud' => $request->input('numero_solicitud'),
            'numero' => $request->input('numero'),
            'estado_poliza_id' => $request->input('estado_poliza_id'),
            'renueva_numero' => $request->input('renueva_numero'),
            'tipo_vigencia_id' => $request->input('tipo_vigencia_id'),
            'vigencia_dias' => $request->input('vigencia_dias'),
            'vigencia_desde' => $request->input('vigencia_desde'),
            'vigencia_hasta' => $request->input('vigencia_hasta'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            'fecha_emision' => $request->input('fecha_emision'),
            'fecha_recepcion' => $request->input('fecha_recepcion'),
            'fecha_entrega_correo' => $request->input('fecha_entrega_correo'),
            'fecha_entrega_original' => $request->input('fecha_entrega_original'),
            'fecha_entrega_email' => $request->input('fecha_entrega_email'),
            'premio' => $request->input('premio'),
            'prima' => $request->input('prima'),
            'plan_pago' => $request->input('plan_pago'),
            'cantidad_cuotas' => $request->input('cantidad_cuotas'),
            'forma_pago_id' => $request->input('forma_pago_id'),
            'detalle_medio_pago' => $request->input('detalle_medio_pago'),
            'comision' => $request->input('comision'),
            'descuento' => $request->input('descuento'),
            'archivada' => $request->input('archivada'),
        ]);
    }
    public function searchPoliza()
    {
        if ($search = Request::get('q')) {
            $numero = Polizas::where('numero', $search)->get();
        }
        // dd($numero);
        return PolizasResource::collection($numero);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poliza = Polizas::find($id);

        $poliza->delete();

        return ['message' => 'Eliminado'];
    }


    public function vigencias()
    {
        $polizas = Polizas::All();
        $hoy = date("Y-m-d H:i:s");
        $hola = 'hola';
        // dd($polizas);
        // foreach ($polizas as $poliza => $value) {
        //     var_dump($value);
        //     // dd($poliza->numero);
        // }
        // dd($hoy);
        $polizas->map(function ($poliza) {
            return dd($poliza);
        });

        return PolizasResource::collection($polizas);
    }
}
