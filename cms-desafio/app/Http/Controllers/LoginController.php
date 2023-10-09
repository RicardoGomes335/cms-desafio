<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use App\Http\Controllers\Auth;
use Illuminate\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existem!';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login ou cadastro para acessar a pagina!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }


    public function autenticar(Request $request)
    {

        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //se não passar no validate
        $request->validate($regras, $feedback);

        //recuperamos os parâmetros do input do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o Model User e consulta o usuario no banco de dados
        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();
        /*
        if (isset($usuario->name)) {
            //dd($usuario);
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            //dd($_SESSION);
            return redirect()->route('tarefa.index');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        */
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.principal');
    }
}
