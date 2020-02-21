@extends('layouts.app', ["current" => "categorias"])
@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/categorias" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da categoria</label>
                <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria" placeholder="Categoria" required autofocus>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@endsection