@extends('layouts.app', ['current' => 'api'])
@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Produtos</h5>
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" onclick="novoProduto()">Novo produto</button>
    </div>
</div>

<div class="modal fade" id="modalProdutos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idProduto">
                    <div class="form-group">
                        <label for="nomeProduto" class="control-label">Nome do produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeProduto" placeholder="Produto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantidadeProduto" class="control-label">Quantidade</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantidadeProduto" placeholder="Quantidade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="precoProduto" class="control-label">Preço do produto</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precoProduto" placeholder="Preço">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select id="categoriaProduto" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
                    <button class="btn btn-secondary btn-sm" type="cancel" data-dissmiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function novoProduto() {
        $('#idProduto').val('');
        $('#nomeProduto').val('');
        $('#quantidadeProduto').val('');
        $('#precoProduto').val('');
        $('#modalProdutos').modal('show');
    }

    function carregarCategorias() {
        $.getJSON('/api/categorias', function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#categoriaProduto').append('<option value="' + data[i].id + '">' + data[i].nome + '</option>');
            }
        });
    }

    $(function() {
        carregarCategorias();
    });
</script>
@endsection