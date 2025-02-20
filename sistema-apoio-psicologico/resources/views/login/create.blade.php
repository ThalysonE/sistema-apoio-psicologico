@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

@extends('login.layout')
@section('title', "Cadastro")

@section('conteudo')
<div class="container login-container">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="{{ route('users.store') }}" method="POST" class ="p-4 p-md5 border rounded-3 bg-light">
                    @csrf
                    <h1 class="mb-2">Cadastro</h1>
                    <p class="mb-4">Sistema de apoio psicológico</p>
                    <div class="form-floating mb-4">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name"> 
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"> 
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password"  class="form-control" placeholder="Senha"> 
                        <label for="password">Senha</label> 
                    </div>
                    <button class="btn btn-lg btn-success w-100" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection