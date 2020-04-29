<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\loginAuthRequest;
use App\Models\userModel;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    // Controller para o dashboard admin
    
    public function dashboard(){

        if (Auth::check() === true){
            
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
