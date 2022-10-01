<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        // -------- Return Products With Filtering, Ordering and a Pagination of 20 Items ----------

        return Product::where($column_filter, $operator_filter, $filter)->orderBy($column_order, $order)->paginate(20);
    }

    public function store(Request $request)
    {
        // ------ Return Created Product -------
        try {
            $Product =  Product::create(json_decode($request->getContent(), true));
            return response(['msg' => 'O Produto Foi Criado com Sucesso!!', 'data' => $Product]);
        } catch (Exception $e) {
            return response(['msg'=>'Não Foi Possivel Criar o Produto, Verifique se todos os campo foram preenchidos! ','Exception Error'=>$e], 400);
        }
    }


    public function show($id)
    {
        // ------ Return Product by ID -------
        $Product = Product::find($id);
        return $Product ? $Product : response('Não Foi Possivel Encontrar o Produto com o ID ' . $id . ' ( O ID Não Foi Encontrado )!', 404);
    }


    public function update(Request $request, $id)
    {
        // ------ Return Updated Product if Product Exists -------

        $Product = Product::find($id);
        if ($Product) {
            $Product->update(json_decode($request->getContent(), true));
            return response(['msg' => 'O Produto com o ID ' . $id . ' Foi Atualizado com Sucesso!!', 'data' => $Product]);
        } else {
            return response('Não Foi Possivel Atualizar o Produto com o ID ' . $id . ' ( O ID Não Foi Encontrado )!', 404);
        }
    }

    public function destroy($id)
    {
        // ------ Return Delete Product Confirmation if Product Exists -------

        return Product::destroy($id) ?
            response('O Produto com o ID ' . $id . ' Foi Deletado com Sucesso!!')
            :
            response('Não Foi Possivel Deletar o Produto com o ID ' . $id . ' (O ID Não Foi Encontrado)!', 404);
    }
}
