<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultas Marcadas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .text{
            font-size: 19px;
        }
        .conteudo{
            background-color:rgb(248, 249, 250);
            height:100vh;
            width: 100%;
            padding: 60px 30px;
        }
        .result{
            margin:40px 10px;
        }
        .custom-table {
        border: 2px solid #75797CFF; /* Cor da borda */
        border-radius: 8px; /* Bordas arredondadas */
        overflow: hidden; /* Garante que os cantos arredondados funcionem */
    }
    th, td{
        text-align:center;
    }
    .tabela, td{
        border:1px solid #B7BEC5FF;
    }
    .tabela{
        max-width: 1400px;
    }
    .margin-consultas{
        margin-top:60px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 nav-bar">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fs-3 fw-bold" href="#">PsicoAgenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-2" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text" aria-current="page" href="#">Início</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-danger text" href="{{route('login.logout')}}">Sair</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="conteudo">
    {{-- Mensagem de boas-vindas --}}
    <h2 class="mb-5">
        Bem-vindo, <span class="text-primary">{{ Auth::user()->name }}</span>!
    </h2>

    <h3 class="margin-consultas">Consultas Marcadas</h3>
    <div class="result">
        @if($consultas->isEmpty())
            <p>Nenhuma consulta marcada 
                <a href="{{ route('agendar.consulta') }}" class="btn btn-success ms-3">Marcar Consulta</a>
            </p>
        @else
            <table class="table table-striped table-hover tabela">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->consultaDisponivel->data)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->consultaDisponivel->data)->format('H:i') }}</td>
                            <td>
                                <form action="{{ route('consulta.desmarcar', $consulta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desmarcar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
