<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
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

        // -------- Return Customers With Filtering, Ordering and a Pagination of 20 Items ----------

        return Customer::where($column_filter, $operator_filter, $filter)->orderBy($column_order, $order)->paginate(20);
    }

    public function store(Request $request)
    {
        // ------ Return Created Customer -------

        return Customer::create(json_decode($request->getContent(), true));
    }


    public function show($id)
    {
        // ------ Return Customer by ID -------

        return Customer::find($id);
    }


    public function update(Request $request, $id)
    {
        // ------ Return Updated Customer if Customer Exists -------

        $customer = Customer::find($id);
        if ($customer) {
            $customer->update(json_decode($request->getContent(), true));
            return response(['msg' => 'O Cliente com o ID ' . $id . ' Foi Atualizado com Sucesso!!', 'data' => $customer]);
        } else {
            return response('Não Foi Possivel Atualizar o Cliente com o ID ' . $id . ' ( O ID Não Foi Encontrado )!', 404);
        }
    }

    public function destroy($id)
    {
        // ------ Return Delete Customer Confirmation if Customer Exists -------

        return Customer::destroy($id) ?
            response('O Cliente com o ID ' . $id . ' Foi Deletado com Sucesso!!')
            :
            response('Não Foi Possivel Deletar o Cliente com o ID ' . $id . ' (O ID Não Foi Encontrado)!', 404);
    }
}
