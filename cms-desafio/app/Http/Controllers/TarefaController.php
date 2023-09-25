<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use Mail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        /*
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        */

        //$tarefas = Tarefa::where('user_id', $user_id)->get();
        //$tarefas = Tarefa::where('id')->get();
        $tarefas = Tarefa::paginate(30);
        return view('tarefa.index', ['tarefas' => $tarefas, 'request' => $request->all()]);
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

        //Image Upload
        if ($request->hasFile('image') && $request->file('image')->IsValid()) {

            $file = $request->file('image');
            $file->store('imagens');
            //$file->storeAs('imagens', $request->user()->id . "." . $file->getClientOriginalExtension());

            /*
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->image->getClientOriginalName() . strtotime("now") . "." . $extension);
            $requestImage->move(public_path('storage/app/public/imagens'), $imageName);
            $data = $requestImage;
            */
            //$data['image'] = $request->image->store('imagens');
            //$path = $request->file('image')->store('imagens');

            //return $path;
        }

        if ($request->hasFile('documento_suporte') && $request->file('documento_suporte')->IsValid()) {
            $doc = $request->file('documento_suporte');
            $doc->store('documento_suporte');
            //$data['documento_suporte'] = $request->documento_suporte->store('documento_suporte');
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
            "image.mimes" => 'A imagem deverá ter no maximo 4098px e ser no formato jpeg ou png!',
            "documento_suporte:mimes" => 'O campo documento suporte de fundo deve ter no maximo 2048px e deverá ser no formato pdf, xls ou csv!',
        ];

        $request->validate($regras, $feedback);

        $dados = $request->all();
        $dados['image'] = $file->hashName();
        $dados['documento_suporte'] = $doc->hashName();
        $dados['user_id'] = auth()->user()->id;


        $tarefa = Tarefa::create($dados);

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

    /** Downloads pdf */
    public function downloadPDF($id)
    {
        $pdf_uploads = DB::table('tarefas')->where('id', $id)->first();
        $pathToFile = storage_path("app/public/documento_suporte/{$pdf_uploads->documento_suporte}");
        return \Response::download($pathToFile);
        //return dd('OK');
    }

    /** Downloads imagens */
    public function downloadIMG($id)
    {
        $img_uploads = DB::table('tarefas')->where('id', $id)->first();
        $pathToFile = storage_path("app/public/imagens/{$img_uploads->image}");
        return \Response::download($pathToFile);
        //return dd('OK');
    }
}
