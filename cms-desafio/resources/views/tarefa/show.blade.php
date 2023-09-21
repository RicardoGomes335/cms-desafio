@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Detalhes: {{ $tarefa->id }}</div>
                    <h1>Tarefa #{{ $tarefa->id }}</h1>
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('tarefa.index') }}">Voltar</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h1>Usuario #{{ $tarefa->id }}</h1>
                        <p>Sub-Titulo: {{ $tarefa->sub_titulo }}</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Sub-Titulo</th>
                                    <th scope="col">Conteúdo</th>
                                    <th scope="col">Imagens</th>
                                    <th scope="col">Documentos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $tarefa->id }}</th>
                                    <td>{{ $tarefa->titulo }}</td>
                                    <td>{{ $tarefa->sub_titulo }}</td>
                                    <td>{{ $tarefa->conteudo }}</td>
                                    <td>{{ $tarefa->image }}</td>
                                    <td>{{ $tarefa->documento_suporte }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
