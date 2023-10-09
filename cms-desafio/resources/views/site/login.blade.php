<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CMS :: Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Report Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}" type="text/css" media="all" />
    <!--//Style-CSS -->

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" media="all">

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1>LOGO</h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree">
                        <h2>Login</h2>
                        <form action="{{ route('site.login') }}" method="post">
                            @csrf
                            <input type="text" class="text" value="{{ old('usuario') }}" name="usuario"
                                placeholder="Email" required="" autofocus>
                            {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}

                            <input type="password" class="password" value="{{ old('senha') }}" name="senha"
                                placeholder="Senha do usuário" required="" autofocus>
                            {{ $errors->has('senha') ? $errors->first('senha') : '' }}

                            <button class="btn" type="submit">Acessar</button>
                        </form>

                        <p class="account">Não tem uma conta? <a href="#signup">Clique aqui para cadastrar</a></p>
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
            <p class="copy-footer-29">© 2023 CMS Desafio. All rights reserved | Design by <a
                    href="#">RicardoGomesDev</a></p>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
</body>

</html>
