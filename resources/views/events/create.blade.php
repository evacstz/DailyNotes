<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Criar novo evento</h1>

    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <label for="title">Evento:</label>
        <input type="text" name="title" required>

        <label for="date">Data:</label>
        <input type="date" name="date" required>

        <label for="time">Hora:</label>
        <input type="time" name="time" required>
        
        <input type="submit" value="Salvar">
    </form>

    <a href="{{ route('events.index') }}">Voltar</a>
</body>
</html>