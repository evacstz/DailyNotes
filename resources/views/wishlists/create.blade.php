<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Adicionar novo item desejado</h1>

    <form action="{{ route('wishlists.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome do item:</label>
        <input type="text" name="name" required>

        <label for="image">Foto do Produto: (opicional)</label>
        <input type="file" name="image" accept="image/*">
        
        <input type="submit" value="Salvar">
    </form>

    <a href="{{ route('wishlists.index') }}">Voltar</a>
</body>
</html>