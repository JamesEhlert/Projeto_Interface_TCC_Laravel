<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Mostrar o formulário de login
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');
    
        $usuario = Usuario::where('email', $email)->where('senha', $senha)->first();
    
        if ($usuario) {
            // Login bem-sucedido
            return view('boas-vindas', ['nome' => $usuario->nome]);
        } else {
            // Credenciais inválidas
            return redirect()->back()->withErrors(['email' => 'Credenciais inválidas.']);
        }
    }
    
    // Mostrar o formulário de registro
    public function showRegister()
    {
        return view('register');
    }

    // Processar o cadastro de um usuário
    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'cpf' => 'required|string|unique:usuarios',
            'senha' => 'required|string|min:8',
        ]);

        // Criar o usuário sem criptografia de senha
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'senha' => $request->senha, // senha salva como texto simples
        ]);

        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // Mostrar a página de boas-vindas
    public function showBoasVindas()
    {
        // Obtendo o nome do usuário logado (exemplo)
        $nome = auth()->user() ? auth()->user()->name : 'Visitante';

        // Retornando a view com a variável $nome
        return view('boas-vindas', ['nome' => $nome]);
    }
}
