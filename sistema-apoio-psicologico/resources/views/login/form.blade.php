@if(Session::has('erro'))
    {{ Session::get('erro') }}
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
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
                    <div class="checkbox mb-4">
                        <label>
                            <input type="checkbox" value="remember"> Lembrar de mim
                        </label>
                    </div>
                    <button class="btn btn-lg btn-success w-100" type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>










