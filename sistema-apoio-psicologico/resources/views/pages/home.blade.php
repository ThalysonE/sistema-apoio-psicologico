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
        <h2>Consultas Marcadas</h2>
        <div class="result">
            @if($consultas->isEmpty())
                <p>Nenhuma consulta marcada <a href="{{ route('agendar.consulta') }}" class="btn btn-success">Marcar Consulta</a></p>
            @else
                @foreach($consultas as $consulta)
                    <p>Consulta ID: {{ $consulta->id }} | Data: {{ \Carbon\Carbon::parse($consulta->consultaDisponivel->data)->format('d/m/Y') }} | Hora: {{ \Carbon\Carbon::parse($consulta->consultaDisponivel->data)->format('H:i') }}</p>
                @endforeach
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
