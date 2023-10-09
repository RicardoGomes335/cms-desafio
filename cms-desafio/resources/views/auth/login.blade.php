@extends('layouts.login')

@section('content')
    <h1>LOGO</h1>
    <div class="container">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="main-hotair">
                <div class="content-wthree">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Digite seu nome">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Digite sua senha">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button class="btn" type="submit">Acessar</button>
                    </form>
                    <p class="account">Esqueci a senha! <a href="{{ route('password.request') }}">Clique aqui</a></p>

                    <p class="account">Não tem uma conta? <a href="{{ route('register') }}">Clique aqui para
                            cadastrar</a></p>
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
