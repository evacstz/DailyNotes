<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daily Notes</title>
</head>
<body>
    <h1>{{ $checklist->title }}</h1>

    <h3>Itens</h3>

    <ul>
        @foreach($checklist->items as $item)
            <li style="margin-bottom: 10px; list-style: none;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <form action="{{ route('items.toggle', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" 
                               onchange="this.form.submit()" 
                               {{ $item->concluido ? 'checked' : '' }}>
                    </form>

                    <p>
                        {{ $item->text }}
                    </p>

                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <br>
    <a href="{{ route('checklists.edit', $checklist) }}">Editar Lista</a> | 
    <a href="{{ route('checklists.index') }}">Voltar</a>
</body>
</html>