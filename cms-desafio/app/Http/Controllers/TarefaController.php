<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use Mail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class TarefaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->image->IsValid()) {
            $request->image->store('imagens');
        }

        if ($request->documento_suporte->IsValid()) {
            $request->documento_suporte->store('documento_suporte');
        }


        $regras = [
            'titulo' => 'required|min:3|max:40',
            'sub_titulo' => 'required|min:3|max:50',
            'conteudo' => 'required|min:3|max:150',
            'image' => 'image|mimes:jpeg,png|max:4096',
            'documento_suporte' => 'required|mimes:pdf,xlx,csv|max:2048'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido!',
            "titulo.min" => 'O campo titulo deve ter no mínimo 3 caracteres!',
            "titulo.max" => 'O campo titulo deve ter no mínimo 40 caracteres!',
            "sub_titulo.min" => 'O campo subtitulo deve ter no mínimo 3 caracteres!',
            "sub_titulo.max" => 'O campo subtitulo deve ter no mínimo 50 caracteres!',
            "conteudo.min" => 'O campo conteudo deve ter no mínimo 3 caracteres!',
            "conteudo.max" => 'O campo conteudo deve ter no mínimo 150 caracteres!',
            "image" => 'O campo imagem de fundo deve ter no maximo 4098px!',
            "documento_suporte" => 'O campo documento suporte de fundo deve ter no maximo 2048px!',
        ];

        $request->validate($regras, $feedback);

        $tarefa = Tarefa::create($request->all());
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
