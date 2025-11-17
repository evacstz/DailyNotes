<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{ $note->title }}</h2>
    <p>{{ $note->text }}</p>
    <a href="{{ route('notes.edit', $note) }}">Editar</a>
</body>
</html>