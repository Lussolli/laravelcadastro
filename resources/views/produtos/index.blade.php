@extends('layouts.app', ['current' => 'produtos'])
@section('body')
<div class="card border">
    <div class="card-body">
        <h2>Produtos</h2>
        <table class="table table-border-table-hover">
            <thead>
                <th>Código</th>
                <th>Nome</th>
                <th>Quantidade em estoque</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->estoque }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->categoria_id }}</td>
                        <td>
                            <a href="/produtos/editar/{{ $produto->id }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="/produtos/apagar/{{ $produto->id }}" class="btn btn-danger btn-sm">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-primary btn-sm">Novo produto</a>
    </div>
</div>
@endsection
