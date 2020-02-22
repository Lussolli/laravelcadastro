@extends('layouts.app', ['current' => 'produtos'])
@section('body')
<div class="card border">
    <div class="card-body">
        <h2>Novo produto</h2>
        <form action="/produtos" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" autofocus placeholder="Produto">
            </div>
            <div class="form-group">
                <label for="estoque">Estoque</label>
                <input type="text" class="form-control" name="estoque" id="estoque" placeholder="Quantidade disponível em estoque">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
            </div>
            <div class="form-group">
                <label for="categoria">Selecione uma categoria:</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
                <button class="btn btn-danger btn-sm" type="cancel">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection