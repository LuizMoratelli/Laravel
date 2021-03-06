<!--coloca a parte do código do template -->
@extends('principal')
<!--define a seção que irá ocupar-->
@section('conteudo')
<div class="container">
    <h1>Listagem de Produtos</h1>
    @if(old('nome'))
        <span class="alert alert-success mt-3 mb-3">
            <!--old('nome') pega os parametros da requisição anterior-->
            Produto {{old('nome')}} adicionado com sucesso!
        </span>
    @endif
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Tamanho</th>
            <th>Categoria</th>
            <th>Detalhes</th>
            <th>Excluir</th>
        </tr>
        @foreach ($produtos as $p)
        <tr class="{{ $p->quantidade <= 1 ? 'bg-warning' : '' }}">
            <td>{{$p->nome}}</td>
            <td>{{$p->valor}}</td>
            <td>{{$p->descricao}}</td>
            <!--caso vazio ou nulo texto-->
            <td>{{$p->quantidade}}</td>
            <td>{{$p->tamanho}}</td>
            <td>{{$p->categoria->nome}}</td>
            <td>
                <a href="/produtos/mostra/{{$p->id}}">
                    <i class="fas fa-search"></i>
                </a>
            </td>
            <td>
                <a href="/produtos/remove/{{$p->id}}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop