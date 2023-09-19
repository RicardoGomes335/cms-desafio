@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Adicionar tarefa</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tarefa.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label">Titulo</label>
                                    <input type="text" name="titulo" value="{{ $tarefa->titulo ?? old('titulo') }}"
                                        class="form-control">
                                    {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                                    <label class="form-label">Sub Título</label>
                                    <input type="text" name="sub_titulo" class="form-control">
                                    {{ $errors->has('sub_titulo') ? $errors->first('sub_titulo') : '' }}
                                    <label for="exampleFormControlTextarea1">Conteúdo</label>
                                    <textarea class="form-control" name="conteudo" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    {{ $errors->has('conteudo') ? $errors->first('conteudo') : '' }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagem de fundo</label>
                                <input type="file" name="image" class="form-control-file">
                                {{ $errors->has('image') ? $errors->first('image') : '' }}
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label">Documento</label>
                                    <input type="file" name="documento_suporte" class="form-control-file">
                                    {{ $errors->has('documento_suporte') ? $errors->first('documento_suporte') : '' }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
