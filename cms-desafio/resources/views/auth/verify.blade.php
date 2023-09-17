@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Falta pouco agora! Precisamos apenas que você valide seu e-mail.</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos para você um e-mail para você com o link de validação
                        </div>
                    @endif

                    Antes de continuar, verifique se há um link de verificação em seu e-mail.
                    <br>
                    Se você não recebeu o e-mail, clique no link a seguir para receber um novo e-mail.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui!</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
