<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Criar nova nota</h1>

    <form action="{{ route('notes.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Título" required>
        <input type="text" name="text" placeholder="Escreva algo..." required>
        <input type="submit" value="Salvar">
    </form>
    
    <a href="{{ route('notes.index') }}">Voltar</a>
</body>
</html>