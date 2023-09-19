@component('mail::message')
    # Titulo: {{ $titulo }}

    Sub Título: {{ $subtitulo }}

    Data de envio: {{ $created_at }}

    @component('mail::button', ['url' => $url])
        Clique aqui para ver os documentos enviados.
    @endcomponent

    Att,<br>
    {{ config('app.name') }}
@endcomponent
