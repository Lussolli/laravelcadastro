@extends('layouts.app', ['current' => 'api'])
@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Produtos</h5>
        <table class="table table-ordered table-hover" id="tabelaProdutos">
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
                    <button class="btn btn-secondary btn-sm" type="cancel" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

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

    function carregarProdutos() {
        $.getJSON('/api/produtos', function(produtos) {
            for (var i = 0; i < produtos.length; i++) {
                linha = montarLinha(produtos[i]);
                $('#tabelaProdutos > tbody').append(linha);
            }
        });
    }

    function montarLinha(produto) {
        var linha = '<tr>';
        linha += '<td>' + produto.id + '</td>';
        linha += '<td>' + produto.nome + '</td>';
        linha += '<td>' + produto.estoque + '</td>';
        linha += '<td>' + produto.preco + '</td>';
        linha += '<td>' + produto.categoria_id + '</td>';
        linha += '<td>';
        linha += '<button class="btn btn-sm btn-primary">Editar</button> ';
        linha += '<button class="btn btn-sm btn-danger">Apagar</button>';
        linha += '</td>';
        linha += '</tr>';
        return linha;
    }

    function criarProduto() {
        return {
            nome: $('#nomeProduto').val(),
            estoque: $('#quantidadeProduto').val(),
            preco: $('#precoProduto').val(),
            categoria_id: $('#categoriaProduto').val()
        };
    }

    $('#formProduto').submit(function(event) {
        event.preventDefault();
        let produto = criarProduto();
        $.post('/api/produtos', produto, function(resposta) {
            $('#modalProdutos').modal('hide');
            let linha = montarLinha(JSON.parse(resposta));
            $('#tabelaProdutos > tbody').append(linha);
        });
    });

    $(function() {
        carregarCategorias();
        carregarProdutos();
    });
</script>
@endsection