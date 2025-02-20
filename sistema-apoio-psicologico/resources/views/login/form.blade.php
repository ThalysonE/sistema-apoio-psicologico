@if(Session::has('erro'))
    {{ Session::get('erro') }}
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif


@extends('login.layout')

@section('title', 'Login')

@section('conteudo')
    <div class="container login-container">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="{{ route('login.auth') }}" method="POST" class ="p-4 p-md5 border rounded-3 bg-light">
                    @csrf
                    <h1 class="mb-2">Login</h1>
                    <p class="mb-4">Sistema de apoio psicológico</p>
                    <div class="form-floating mb-4">
                        <input name="email" id="email" class="form-control" placeholder="E-mail"> 
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password"  class="form-control" placeholder="Senha"> 
                        <label for="password">Senha</label> 
                    </div>
                    <div class=" d-flex justify-content-between mb-4">
                        <label class="checkbox">
                            <input type="checkbox" value="remember"> Lembrar de mim
                        </label>
                        <div>
                            <a href="{{ route('login.create') }}">Criar Conta</a>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success w-100" type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection









