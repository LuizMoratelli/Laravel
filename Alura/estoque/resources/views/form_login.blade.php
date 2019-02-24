@extends('principal')
@section('conteudo')
<div class="container">
    <form action="/loginNovo" method="POST">
        <!--Token do Laravel para permitir envio de POSTS-->
        
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" name="email" type="text">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" type="text">
        </div>
        <button class="btn btn-primary" type="submit">Logar</button>
    </form>
</div>
@stop