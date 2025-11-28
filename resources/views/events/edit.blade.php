<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar evento</h1>

    <form action="{{ route('events.update', $event) }}" method="post">
        @method("put")
        @csrf
        <label for="title">Evento:</label>
        <input type="text" name="title" value="{{ $event->title }}">

        <label for="date">Data:</label>
        <input type="date" name="date" value="{{ $event->date }}">

        <label for="time">Hora:</label>
        <input type="time" name="time" value="{{ $event->time }}">
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>