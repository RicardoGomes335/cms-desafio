@extends('layouts.login')

@section('content')
    <h1>LOGO</h1>
    <div class="container">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="main-hotair">
                <div class="content-wthree">
                    <h2>Cadastro</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Digite seu nome">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Digite seu e-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Digite sua senha">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirme sua senha">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Cadastrar novo usuário') }}
                        </button>
                    </form>
                    <p class="account">Já tenho conta! <a href="{{ route('login') }}">Clique aqui</a></p>
                </div>
                <div class="w3l_form align-self">
                    <div class="left_grid_info">
                        <img src="{{ asset('img/1.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
        <!-- //form -->
    </div>
    <!-- copyright-->
    <div class="copyright text-center">
        <p class="copy-footer-29">© 2023 CMS Desafio. All rights reserved | Design by <a href="#">RicardoGomesDev</a>
        </p>
    </div>
    <!-- //copyright-->
@endsection
