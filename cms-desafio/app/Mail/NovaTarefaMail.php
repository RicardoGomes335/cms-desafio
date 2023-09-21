<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $titulo;
    public $subtitulo;
    public $url;
    public $created_at;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->titulo = $tarefa->titulo;
        $this->subtitulo = $tarefa->sub_titulo;
        $this->created_at = date('d/m/Y', strtotime($tarefa->created_at));
        $this->url = 'http://localhost:8080/tarefa/' . $tarefa->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-tarefa')->subject('Novo(s) documentos enviados!');
    }
}
