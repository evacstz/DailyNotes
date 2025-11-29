<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar lista</h1>

    <form action="{{ route('checklists.update', $checklist) }}" method="POST">
        @method("put")
        @csrf
        <label>Título:</label>
        <input type="text" name="title" value="{{ $checklist->title }}" required>

        <h3>Itens</h3>

        <div id="items">
            @foreach($checklist->items as $item)
                <input type="text" name="items[]" value="{{ $item->text }}" required>
            @endforeach
            <input type="text" name="items[]" placeholder="Adicione um item">
        </div>

        <button type="button" onclick="addItem()">Novo item</button>

        <input type="submit" value="Salvar alterações">
    </form>

    <a href="{{ route('checklists.index') }}">Voltar</a>

    <script>
        function addItem() {
            const container = document.getElementById('items');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'items[]';
            input.placeholder = 'Adicione um item';
            container.appendChild(document.createElement('br'));
            container.appendChild(input);
        }
    </script>
</body>
</html>
