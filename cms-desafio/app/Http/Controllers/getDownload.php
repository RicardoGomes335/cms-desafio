<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Storage;


class getDownload extends Controller
{
    public function getDownload(Request $request, Tarefa $tarefa)
    {
        if (Storage::disk('public')->exists("documento_suporte/$tarefa->documento_suporte")) {
            $path = Storage::disk('public')->path("documento_suporte/$tarefa->documento_suporte");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
