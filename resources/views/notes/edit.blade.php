<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar nota</h1>

    <form action="{{ route('notes.update', $note) }}" method="post">
        @method("put")
        @csrf
        <input type="text" name="title" value="{{ $note->title }}">
        <input type="text" name="text" value="{{ $note->text }}">
        <input type="submit" value="Salvar alterações">
    </form>

    <a href="{{ route('notes.index') }}">Voltar</a>
</body>
</html>