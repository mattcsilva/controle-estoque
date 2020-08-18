<?php

namespace App\Http\Controllers\API;

use App\Fornecedor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fornecedor::all();

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
            'nome'      => 'required|min:1',
            'cnpj'  => 'required|min:8',
            'telefone'  => 'required|min:8'
        ], [
            'required'  => 'A propriedade é obrigatória!',
            'min'       => 'Informe um valor válido!'
        ]);

        $data = Fornecedor::create($request->all());

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
        $data = Fornecedor::find($id);

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
        $data = Fornecedor::find($id);
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
        $data = Fornecedor::find($id);
        $data->delete();

        return response()->json([], 200);
    }
}
