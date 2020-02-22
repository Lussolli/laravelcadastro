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

    function editar(id) {
        $.getJSON('/api/produtos/' + id, function(produto) {
            $('#idProduto').val(produto.id);
            $('#nomeProduto').val(produto.nome);
            $('#quantidadeProduto').val(produto.estoque);
            $('#precoProduto').val(produto.preco);
            $('#categoriaProduto').val(produto.categoria_id);
            $('#modalProdutos').modal('show');
        });
    }

    function remover(id) {
        $.ajax({
            type: 'DELETE',
            url: '/api/produtos/' + id,
            context: this,
            success: function() {
                let linhas = $('#tabelaProdutos > tbody > tr');
                let elemento = linhas.filter(function(i, elemento) {
                    return elemento.cells[0].textContent == id;
                });
                if (elemento)
                    elemento.remove();
            },
            error: function(error) {
                console.error(error);
            }
        })
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
        linha += '<button class="btn btn-sm btn-primary" onclick="editar(' + produto.id + ')">Editar</button> ';
        linha += '<button class="btn btn-sm btn-danger" onclick="remover(' + produto.id + ')">Apagar</button>';
        linha += '</td>';
        linha += '</tr>';
        return linha;
    }

    function criarProduto() {
        let produto = {
            nome: $('#nomeProduto').val(),
            estoque: $('#quantidadeProduto').val(),
            preco: $('#precoProduto').val(),
            categoria_id: $('#categoriaProduto').val()
        };

        $.post('/api/produtos', produto, function(resposta) {
            $('#modalProdutos').modal('hide');
            let linha = montarLinha(JSON.parse(resposta));
            $('#tabelaProdutos > tbody').append(linha);
        });
    }

    function editarProduto() {
        let produto = {
            id: $('#idProduto').val(),
            nome: $('#nomeProduto').val(),
            estoque: $('#quantidadeProduto').val(),
            preco: $('#precoProduto').val(),
            categoria_id: $('#categoriaProduto').val()
        };

        $.ajax({
            type: 'PUT',
            url: '/api/produtos/' + produto.id,
            data: produto,
            context: this,
            success: function(data) {
                data = JSON.parse(data);
                let linhas = $('#tabelaProdutos > tbody > tr');
                let elemento = linhas.filter(function(i, elemento) {
                    return elemento.cells[0].textContent == data.id;
                });

                if (elemento) {
                    elemento[0].cells[0].textContent = data.id;
                    elemento[0].cells[1].textContent = data.nome;
                    elemento[0].cells[2].textContent = data.estoque;
                    elemento[0].cells[3].textContent = data.preco;
                    elemento[0].cells[4].textContent = data.categoria_id;
                }
            },
            error: function(error) {
                console.error(error);
            }
        })
    }

    $('#formProduto').submit(function(event) {
        event.preventDefault();
        if ($('#idProduto').val() != '') {
            editarProduto();
        } else {
            criarProduto();
        }
    });

    $(function() {
        carregarCategorias();
        carregarProdutos();
    });
</script>
@endsection