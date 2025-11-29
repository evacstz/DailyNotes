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
        <h3>Lembretes</h3>
        <button>
            <a href="{{ route('reminders.create') }}">Novo lembrete</a>
        </button>
    </div>

    @foreach($reminders as $reminder)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $reminder->text }}</h3>
            <p>{{ $reminder->time }}</p>
            <a href="{{ route('reminders.edit', $reminder) }}">Editar</a>
            <form action="{{ route('reminders.destroy', $reminder) }}" method="post">
                @method("delete")
                @csrf
                <input type="submit" value="Deletar">
            </form>
        </div>
    @endforeach
</body>
</html>