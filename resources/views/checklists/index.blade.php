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
        <h3>Checklists</h3>
        <button>
            <a href="{{ route('checklists.create') }}">Nova lista</a>
        </button>
    </div>

    @foreach($checklists as $checklist)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $checklist->title }}</h3>
            <a href="{{ route('checklists.show', $checklist) }}">Ver lista</a>
            <form action="{{ route('checklists.destroy', $checklist) }}" method="post">
                @method("delete")
                @csrf
                <input type="submit" value="Deletar">
            </form>
        </div>
    @endforeach
</body>
</html>