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
        ->join('vendedors', 'vendas.id_cliente', '=', 'vendedors.id')
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
    public function store(Request $request)
    {
        $request->validate([
            'valor_total' => 'required|min:1',
            'id_cliente'  => 'required|min:1',
            'id_vendedor' => 'required|min:1'
        ], [
            'required'  => 'A propriedade é obrigatória!',
            'min'       => 'Informe um valor válido!'
        ]);

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
