<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar lembrete</h1>

    <form action="{{ route('reminders.update', $reminder) }}" method="post">
        @method("put")
        @csrf
        <label for="text">Para lembrar:</label>
        <input type="text" name="text" value="{{ $reminder->text }}" required>

        <label for="time">Hora:</label>
        <input type="time" name="time" value="{{ $reminder->time }}">

        <input type="submit" value="Salvar alterações">
    </form>

    <a href="{{ route('reminders.index') }}">Voltar</a>
</body>
</html>