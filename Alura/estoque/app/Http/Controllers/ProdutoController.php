<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use App\Produto;

class ProdutoController extends Controller {
    public function lista() {
        //$produtos = DB::select('select * from produtos');
        //Eloquent
        $produtos = Produto::all();
        //listar produtos
        //dd($produtos);
        //with - envia informações
        return view('listagem')->with('produtos', $produtos);
    }

    public function mostra($id) {
        //pega os parametros da requisicao, valor default
        //$id = Request::input('id', '1');
        //pega os parametros da rota
        //se colocar como parametro da função o laravel já pega pela route
        //$id = Request::route('id');
        //pega todos os parametros da requisicao
        //Request::all();
        //$produto = DB::select('select * from produtos where id = ?', [$id]);
        $produto = Produto::find($id);
        if (empty($produto)) return "Esse produto não existe";
        return view('detalhes')->with('p', $produto);
    }

    public function novo() {
        return view('formulario');
    }

    public function adiciona() {
        // $params = Request::all();
        // $produto = new Produto($params);
        //outra maneira de criar é assim (cria, constroi e salva no banco)
        Produto::create(Request::all());
        //pegar informações do formulario
        // $produto->nome = Request::input('nome');
        // $produto->valor = Request::input('valor');
        // $produto->quantidade = Request::input('quantidade');
        // $produto->descricao = Request::input('descricao');

        //salvar no banco de dados 
        //DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?, ?, ?, ?)', [$nome, $quantidade, $valor, $descricao]);
        //$produto->save();

        //return view('adiciona')->with('nome', $nome);
        //withInput passa os parametros da requisicao
        //withInput(Request::only('nome'))
        //withInput(Request::except('senha'))
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
        //return redirect('/produtos')->withInput();
    }

    public function listaJson() {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

    public function remove($id) {
        //se colocar como parametro da função o laravel já pega pela route
        //$id = Request::route('id');
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
        //return redirect('/produtos');
    }
}