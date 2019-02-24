@extends('principal')
@section('conteudo')
<div class="container">
    @if ($errors->all())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <form action="/produtos/adiciona" method="POST">
        <!--Token do Laravel para permitir envio de POSTS-->
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" type="text">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input class="form-control" name="valor" type="text">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input class="form-control" name="quantidade" type="text">
        </div>
        <div class="form-group">
            <label for="tamanho">Tamanho</label>
            <input class="form-control" name="tamanho" type="text">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select class="form-control" name="categoria_id" type="text">
            @foreach($categorias as $c)
                <option value="{{$c->id}}">{{$c->nome}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" name="" id="" cols="30" rows="10"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</div>
@stop