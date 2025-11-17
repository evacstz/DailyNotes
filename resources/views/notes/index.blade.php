<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <h1>DailyNotes</h1>

    <div style="display: flex; justify-content: space-between;">
        <h3>Notas</h3>
        <button>
            <a href="{{ route('notes.create') }}">Nova nota</a>
        </button>
    </div>

    @foreach($notes as $note)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->text }}</p>
            <a href="{{ route('notes.show', $note) }}">Ver mais</a>
        </div>
    @endforeach
</body>
</html>