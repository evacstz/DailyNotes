<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Daily Notes</h1>

    <div style="display: flex; justify-content: space-between;">
        <h3>Eventos</h3>
        <button>
            <a href="{{ route('events.create') }}">Novo evento</a>
        </button>
    </div>

     @foreach($events as $event)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $event->title }}</h3>
            <p>{{ $event->date }}</p>
            <p>{{ $event->time }}</p>
            <a href="{{ route('events.edit', $event) }}">Editar</a>
            <form action="{{ route('events.destroy', $event) }}" method="post">
                @method("delete")
                @csrf
                <input type="submit" value="Deletar">
            </form>
        </div>
    @endforeach
</body>
</html>