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
        <h3>Lista de Desejos</h3>
        <button>
            <a href="{{ route('wishlists.create') }}">Novo item</a>
        </button>
    </div>

    @foreach($wishlists as $wishlist)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $wishlist->name }}</h3>
            <img src="{{ asset('storage/' . $wishlist->image) }}" alt="{{ $wishlist->name }}" width="150" style="display: block; margin-bottom: 10px;">
            <a href="{{ route('wishlists.edit', $wishlist) }}">Editar</a>
        </div>
    @endforeach
</body>
</html>