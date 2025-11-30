<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar item desejado</h1>

    <form action="{{ route('wishlists.update', $wishlist) }}" method="post" enctype="multipart/form-data">
        @method("put")
        @csrf
        <label for="name">Nome do item:</label>
        <input type="text" name="name" value="{{ $wishlist->name }} "  required>

        <label for="image">Foto do Produto: (opicional)</label>
        <img src="{{ asset('storage/' . $wishlist->image) }}" width="150" style="display: block; margin-bottom: 10px;">
        
        <p>Trocar Imagem (Deixe vazio para manter a atual):</p>
        <input type="file" name="image" accept="image/*">

        <input type="submit" value="Salvar alterações">
    </form>

    <a href="{{ route('wishlists.index') }}">Voltar</a>
</body>
</html>