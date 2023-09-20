<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use App\Http\Requests\StoreServidorRequest;
use App\Http\Requests\UpdateServidorRequest;

class ServidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servidores = Servidor::orderBy('nome')->get();
        return view('servidor.index', [
            'servidores' => $servidores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servidor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServidorRequest $request)
    {
        $servidor = Servidor::create($request->validated());
        if (!$servidor) {
            redirect()->back()->with('error', 'Erro ao cadastrar servidor');
        }
        return redirect()->route('servidor.index')->with('message', 'Servidor cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servidor $servidor)
    {
        return view('servidor.edit', [
            'servidor' => $servidor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServidorRequest $request, Servidor $servidor)
    {
        $servidorAtualizado = $servidor->update($request->validated());
        if (!$servidorAtualizado) {
            redirect()->back()->with('error', 'Erro ao atualizar servidor');
        }
        return redirect()->route('servidor.index')->with('message', 'Servidor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servidor $servidor)
    {
        if($servidor->portarias()->count() > 0) {
            echo $servidor->portarias()->count();
            return redirect()->back()->with('error', 'Servidor não pode ser deletado pois possui portaria(s) vinculadas');
        }
        $servidorDeletado = $servidor->delete();
        if (!$servidorDeletado) {
            redirect()->back()->with('error', 'Erro ao deletar servidor');
        }
        return redirect()->route('servidor.index')->with('message', 'Servidor deletado com sucesso');
    }
}
