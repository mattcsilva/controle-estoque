<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ItemVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id_venda
     * @return \Illuminate\Http\Response
     */
    public function index($id_venda)
    {
        $data = DB::table('item_vendas')
        ->join('produtos', 'item_vendas.id_produto', '=', 'produtos.id')
        ->where('id_venda', '=', $id_venda)
        ->select('item_vendas.*', 'produtos.descricao')
        ->get();

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ItemVendaRequest $request)
    {
        $id_venda = $request->id_venda;
        $id_produto = $request->id_produto;

        $venda = \App\Venda::find($id_venda);
        $produto = \App\Produto::find($id_produto);

        // Validação
        $message = array();

        if($venda == null)
            array_push($message, "Venda não existe!");
        if($produto == null)
            array_push($message, "Produto não existe!");
        else if($produto->estoque < $request->quantidade)
            array_push($message, "Produto não tem estoque suficiente!");

        if(sizeof($message) > 0)
            return response()->json($message, 200);

        // Cria item
        $data = ItemVenda::create($request->all());

        // Atualiza total da venda
        $totalProduto = $request->preco * $request->quantidade;
        $venda->fill([ 'valor_total' => $venda->valor_total + $totalProduto ]);
        $venda->save();

        // Atualiza estoque
        $produto->fill([ 'estoque' => ($produto->estoque - $request->quantidade) ]);
        $produto->save();

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_venda
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_venda, $id)
    {
        $data = ItemVenda::all()->where('id_venda', '=', $id_venda)->find($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_venda
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_venda, $id)
    {
        $item = ItemVenda::all()->where('id_venda', '=', $id_venda)->find($id);
        $item->fill($request->all());
        $item->save();

        return response()->json($item, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_venda
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_venda, $id)
    {
        $item = ItemVenda::all()->where('id_venda', '=', $id_venda)->find($id);
        $item->delete();

        return response()->json([], 200);
    }
}
