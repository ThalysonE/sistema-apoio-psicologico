<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agendar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: rgb(248, 249, 250);
        }
        .text{
            font-size: 19px;
        }
        .conteudo{
            background-color:rgb(248, 249, 250);
            height:100vh;
            width: 100%;
            padding: 60px 30px;
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
                    <a class="nav-link active text" aria-current="page" href="{{route('pages.home')}}">Início</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-danger text" href="{{route('login.logout')}}">Sair</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Agendar uma Consulta</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('agendar.consulta.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="consulta" class="form-label">Escolha uma consulta disponível</label>
                <select class="form-control" name="id_consulta_disponivel" id="consulta" required>
                    <option value="">Selecione uma consulta</option>
                    @foreach($consultasDisponiveis as $consulta)
                        <option value="{{ $consulta->id }}">
                            {{ $consulta->psicologo->name }} - {{ \Carbon\Carbon::parse($consulta->data)->format('d/m/Y H:i') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agendar Consulta</button>
            
            
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
