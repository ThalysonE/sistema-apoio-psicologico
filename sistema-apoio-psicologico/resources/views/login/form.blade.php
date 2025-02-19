@if(Session::has('erro'))
    {{ Session::get('erro') }}
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif
<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    <label for="email">Email</label> <br>
    <input name="email" id="email"> <br>

    <label for="password">Senha</label> <br>
    <input type="password" name="password" id="password"> <br>

    <button type="submit">Entrar</button>
    
</form>