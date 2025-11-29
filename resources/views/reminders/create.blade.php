<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Criar novo lembrete</h1>

    <form action="{{ route('reminders.store') }}" method="post">
        @csrf
        <label for="text">Para lembrar:</label>
        <input type="text" name="text" placeholder="Lembrete..." required>

        <label for="time">Hora:</label>
        <input type="time" name="time">
        
        <input type="submit" value="Salvar">
    </form>

    <a href="{{ route('reminders.index') }}">Voltar</a>
</body>
</html>