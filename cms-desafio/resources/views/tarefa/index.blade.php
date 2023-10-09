@extends('layouts.app')



@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Olá {{ Auth::user()->name }}! - Documentos</div>
                    <ul>
                        <li>
                            <a href="{{ route('tarefa.create') }}">Nova Tarefa</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Alteração</th>
                                    <th scope="col">Quem Alterou</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $t['titulo'] }}</th>
                                        <td>{{ $t['user_id'] }}</td>
                                        <td><a href="{{ route('tarefa.show', ['tarefa' => $t->id]) }}">Mais
                                                Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link"
                                        href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>

                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Próximo</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
