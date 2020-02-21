@extends('layouts.app', ['current' => 'categorias'])
@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Categorias</h5>
        @if (count($itens) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome da categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itens as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>
                                <a href="/categorias/editar/{{ $item->id }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="/categorias/apagar/{{ $item->id }}" class="btn btn-danger btn-sm">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="card-footer">
        <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
    </div>
</div>

@endsection