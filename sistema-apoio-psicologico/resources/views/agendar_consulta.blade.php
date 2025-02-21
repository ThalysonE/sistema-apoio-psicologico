<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agendar Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
