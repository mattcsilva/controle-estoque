<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vendas')
        ->join('clientes', 'vendas.id_cliente', '=', 'clientes.id')
        ->join('vendedors', 'vendas.id_vendedor', '=', 'vendedors.id')
        ->select('vendas.*', 'clientes.nome as cliente', 'vendedors.nome as vendedor')
        ->get();

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\VendaRequest $request)
    {
        $id_cliente = $request->id_cliente;
        $id_vendedor = $request->id_vendedor;

        $cliente = \App\Cliente::find($id_cliente);
        $vendedor = \App\Vendedor::find($id_vendedor);

        $message = array();

        if($cliente == null)
            array_push($message, "Cliente não existe!");
        if($vendedor == null)
            array_push($message, "Vendedor não existe!");

        if(sizeof($message) > 0)
            return response()->json($message, 200);

        $data = Venda::create($request->all());

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Venda::find($id);

        return response()->json($data, 200);
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
        $data = Venda::find($id);
        $data->fill($request->all());
        $data->save();

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Venda::find($id);
        $data->delete();

        return response()->json([], 200);
    }
}
