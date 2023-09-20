<?php

namespace App\Http\Controllers;

use App\Models\Portaria;
use App\Models\Servidor;
use App\Http\Requests\StorePortariaRequest;
use App\Http\Requests\UpdatePortariaRequest;

class PortariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portarias = Portaria::orderByDesc('ano')->orderByDesc('numero')->get();
        return view('portaria.index', [
            'portarias' => $portarias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $servidores = Servidor::orderBy('nome')->get();
        return view('portaria.create', [
                'servidores' => $servidores,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortariaRequest $request)
    {
        $arquivo = $request->file('arquivo');
        $nome = "portaria-".$request->numero."-".$request->ano.".".$arquivo->getClientOriginalExtension();
        $arquivo->storePubliclyAs('public/portarias', $nome);
        $portaria = Portaria::create([
            'numero' => $request->numero,
            'ano' => $request->ano,
            'visibilidade'=> $request->visibilidade,
            'publicacao'=> $request->publicacao,
            'validade' => $request->validade,
            'data_validade' => $request->data_validade,
            'descricao' => $request->descricao,
            'arquivo' => $nome,
            'integrantes_nao_servidores' => $request->integrantes_nao_servidores,
           
        ]);
        if (!$portaria) {
            redirect()->back()->with('error', 'Erro ao cadastrar portaria');
        }
        foreach ($request->servidores as $servidor) {
            $portaria->servidores()->attach($servidor);
        }
        return redirect()->route('portaria.index')->with('message', 'Portaria cadastrada com sucesso');
        dd($arquivo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portaria $portaria)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portaria $portaria)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortariaRequest $request, Portaria $portaria)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portaria $portaria)
    {
        $file = storage_path('app/public/portarias/'.$portaria->arquivo);
        if (file_exists($file)) {
            unlink($file);
        }
        $portaria->servidores()->detach();
        $portariaDeletada = $portaria->delete();
        if(!$portariaDeletada) {
            return redirect()->back()->with('error', 'Erro ao deletar portaria');
        }
        return redirect()->route('portaria.index')->with('message', 'Portaria deletada com sucesso');
    }
}
