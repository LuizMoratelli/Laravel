<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {
    public function lista() {
        $produtos = DB::select('select * from produtos');
        //listar produtos
        //dd($produtos);
        //with - envia informações
        return view('listagem')->with('produtos', $produtos);
    }

    public function mostra() {
        //pega os parametros da requisicao, valor default
        //$id = Request::input('id', '1');
        //pega os parametros da rota
        $id = Request::route('id');
        //pega todos os parametros da requisicao
        //Request::all();
        $produto = DB::select('select * from produtos where id = ?', [$id]);
        if (empty($produto)) return "Esse produto não existe";
        return view('detalhes')->with('p', $produto[0]);
    }

    public function novo() {
        return view('formulario');
    }

    public function adiciona() {
        //pegar informações do formulario
        $nome = Request::input('nome');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');
        $descricao = Request::input('descricao');

        //salvar no banco de dados 
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?, ?, ?, ?)', [$nome, $quantidade, $valor, $descricao]);

        //return view('adiciona')->with('nome', $nome);
        //withInput passa os parametros da requisicao
        //withInput(Request::only('nome'))
        //withInput(Request::except('senha'))
        return redirect('/produtos')->withInput();
    }

    public function listaJson() {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }
}