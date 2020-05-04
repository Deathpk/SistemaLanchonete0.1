<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\loginAuthRequest;
use App\Models\userModel;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    // Controller para o dashboard admin
    
    
    public function dashboard(){
/*
* Se o usuário estiver logado , e o id for igual a 1 (id da conta admin) , então redireciona pro dash , senão redireciona pro login de
*/
        if (Auth::check() === true && Auth::id() == 1){ 

            return view('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login');
        }
        
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(loginAuthRequest $request){

        

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,

        ];

       $passwordTest = userModel::where('email','=',$request->email)->get('password'); // Pega a senha de onde o email inserido é igual ao do formulário , para fazer o teste depois.
        

        if (Auth::attempt($credentials)){
            return redirect()->route('admin');
        
            }
            
        else{
            Auth::logout();
            if ($request->password != $passwordTest){
                return redirect()->route('admin.login')->withErrors('Senha não confere.');
            }
            
        }
        
        
        }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }

    public function register(){
        Auth::logout(); // Implementei o logout pois o sistema não aceita fazer registro estando logado em uma conta :).
        return view('auth.register');
    }


}
