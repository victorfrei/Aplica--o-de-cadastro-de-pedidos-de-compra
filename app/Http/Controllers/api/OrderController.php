<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function index(Request $request)
    {
        // ------------- Get All Query Params From Request -------------

        $input = $request->query();

        //------------- Order By 'asc' or 'desc' and by Table Column Name ---------

        $order = array_key_exists('ordem', $input) ? $input['ordem'] : 'asc';
        $column_order =  array_key_exists('campo_ordem', $input) ? $input['campo_ordem'] : 'id';

        // ----- Filter With Table Column Name, Operator '>' or '>=' or '<' or '<=' or '=' and with data defined by filter --------

        $filter = array_key_exists('filtro', $input) ? $input['filtro'] : '0';
        $operator_filter = array_key_exists('operador_filtro', $input) ? $input['operador_filtro'] : '>=';
        $column_filter =  array_key_exists('campo_filtro', $input) ? $input['campo_filtro'] : 'id';

        // -------- Return Orders With Filtering, Ordering and a Pagination of 20 Items ----------

        return Order::where($column_filter, $operator_filter, $filter)->orderBy($column_order, $order)->paginate(20);
    }

    public function store(Request $request)
    {
        // ------ Return Created Order -------

        try {
            $Order =  Order::create(json_decode($request->getContent(), true));
            return response(['msg' => 'O Produto Foi Criado com Sucesso!!', 'data' => $Order]);
        } catch (Exception $e) {
            return response(['msg'=>'Não Foi Possivel Criar o Produto, Verifique se todos os campo foram preenchidos! ','Exception Error'=>$e], 400);
        }
    }


    public function show($id)
    {
        // ------ Return Order by ID -------

        $Order = Order::find($id);
        return $Order ? $Order : response('Não Foi Possivel Encontrar o Pedido com o ID ' . $id . ' ( O ID Não Foi Encontrado )!', 404);

    }


    public function update(Request $request, $id)
    {
        // ------ Return Updated Order if Order Exists -------

        $Order = Order::find($id);
        if ($Order) {
            $Order->update(json_decode($request->getContent(), true));
            return response(['msg' => 'O Pedido com o ID ' . $id . ' Foi Atualizado com Sucesso!!', 'data' => $Order]);
        } else {
            return response('Não Foi Possivel Atualizar o Pedido com o ID ' . $id . ' ( O ID Não Foi Encontrado )!', 404);
        }
    }

    public function destroy($id)
    {
        // ------ Return Delete Order Confirmation if Order Exists -------

        return Order::destroy($id) ?
            response('O Pedido com o ID ' . $id . ' Foi Deletado com Sucesso!!')
            :
            response('Não Foi Possivel Deletar o Pedido com o ID ' . $id . ' (O ID Não Foi Encontrado)!', 404);
    }
}
