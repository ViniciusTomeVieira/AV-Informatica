<?php

namespace App\Http\Controllers;

use App\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::all();
        return view('costumer.index')->with([
            'costumers' => $costumers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  Nome, CPF, logradouro, número, bairro, cidade, CEP e estado
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'cpf' => 'required|min:14',
            'logradouro' => 'required|min:2',
            'numero' => 'required|min:1',
            'bairro' => 'required|min:2',
            'cidade' => 'required|min:2',
            'cep' => 'required|min:9',
            'estado' => 'required|min:2'
        ]);
        $costumer = new Costumer([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
            'estado' => $request->estado
        ]);

        $costumer->save();

        return $this->index()->with([
            'message_success'=> "O cliente <b>".$costumer->nome. "</b> foi criado."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        return view('costumer.show')->with([
            'costumer' => $costumer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumer $costumer)
    {
        return view('costumer.edit')->with([
            'costumer' => $costumer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'cpf' => 'required|min:14',
            'logradouro' => 'required|min:2',
            'numero' => 'required|min:1',
            'bairro' => 'required|min:2',
            'cidade' => 'required|min:2',
            'cep' => 'required|min:9',
            'estado' => 'required|min:2'
        ]);

        $costumer->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
            'estado' => $request->estado
        ]);

        return $this->index()->with([
            'message_success'=> "O cliente <b>".$costumer->nome. "</b> foi atualizado." 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        $oldName = $costumer->nome;
        $costumer->delete();

        return $this->index()->with([
            'message_success'=> "O cliente <b>".$oldName. "</b> foi deletado." 
        ]);
    }
}
