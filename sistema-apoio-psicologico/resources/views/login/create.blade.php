@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="nome">Nome</label> <br>
    <input type="text" name="name" id="name"> <br>

    <label for="email">Email</label> <br>
    <input type="email" name="email" id="email"> <br>

    <label for="password">Senha</label> <br>
    <input type="password" name="password" id="password"> <br>

    <button type="submit">Cadastrar</button>
    
</form>