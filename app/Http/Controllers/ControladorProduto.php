<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
use App\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.novo', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cria um novo produto.
        $produto = new Produto();
        // Insere no produtos os dados enviados pelo formulário.
        $produto->nome = $request->input('nome');
        $produto->estoque = $request->input('estoque');
        $produto->preco = $request->input('preco');
        $produto->categoria_id = $request->input('categoria_id');
        // Persiste os novos dados.
        $produto->save();
        // Redireciona para a tela de listagem de produtos.
        return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        if (isset($produto)) {
            return view('produtos.editar', compact('produto', 'categorias'));
        }
        return redirect('/produtos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if (isset($produto)) {
            $produto->nome = $request->input('nome');
            $produto->estoque = $request->input('estoque');
            $produto->preco = $request->input('preco');
            $produto->categoria_id = $request->input('categoria_id');
            $produto->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if (isset($produto)) {
            $produto->delete();
        }
        return redirect('/produtos');
    }
}
