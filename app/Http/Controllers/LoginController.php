<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
   
    
    public function auth( Request $request){
        $credenciais = $request->validate(
            [
                'email' => 'required', 'email',
                'password'=> 'required',
            ], 
            [
                'email.required' => 'O campo email é obrigatório!',
                'email.email'=>'O email não é válido',
                'password.required'=> 'O campo senha é obritatório!'
            ]
        );

        if(Auth::attempt($credenciais, $request->remember)){
            $request ->session()->regenerate();
            return redirect()->intended(route('pages.home'));

        }else{
            return redirect()->back()->with('erro', 'Email ou senha inválida.');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login.form'));

    }
    public function create(){
        return view('login.create');

    }
}

