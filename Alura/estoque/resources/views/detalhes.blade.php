<!--coloca a parte do código do template -->
@extends('principal')
<!--define a seção que irá ocupar-->
@section('conteudo')
<div class="container">
<!--$p->nome == {{$p->nome}}-->
    <h1>Detalhes do Produto {{$p->nome}}</h1>
    <ul>
        <li>Descrição: {{$p->descricao}}</li>
    </ul>
</div>
@stop