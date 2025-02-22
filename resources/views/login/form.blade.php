@extends('login.layout')

@section('title', 'Login')

@section('conteudo')
    <div class="container login-container">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="{{ route('login.auth') }}" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
                    @csrf
                    <h1 class="mb-2">Login</h1>
                    <p class="mb-4">Sistema de apoio psicológico</p>

                    {{-- Exibição de erros da sessão --}}
                    @if(Session::has('erro'))
                        <div class="alert alert-danger">
                            {{ Session::get('erro') }}
                        </div>
                    @endif

                    {{-- Exibição de erros de validação --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-floating mb-4">
                        <input name="email" id="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}"> 
                        <label for="email">E-mail</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha"> 
                        <label for="password">Senha</label> 
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <label class="checkbox">
                            <input type="checkbox" value="remember" name="remember"> Lembrar de mim
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
