<!-- <!DOCTYPE html>
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
            <form action="{{ route('wishlists.destroy', $wishlist) }}" method="post">
                @method("delete")
                @csrf
                <input type="submit" value="Deletar">
            </form>
        </div>
    @endforeach
</body>
</html> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>
    
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-pink-600 tracking-tight">Daily Notes</span>
                </div>

                <div class="flex items-center space-x-6 text-sm sm:text-base font-medium">
                    <a href="{{ route('notes.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Notas</a>
                    <a href="{{ route('events.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Eventos</a>
                    <a href="{{ route('checklists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-700 font-bold">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>

                    <a href="{{ route('profile.edit') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Perfil</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border border-pink-600 rounded-md px-4 py-1 text-pink-600 hover:bg-pink-50 hover:text-pink-800 transition-colors font-bold text-sm">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto py-10 px-4">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-normal text-gray-900">Lista de Desejos</h1>
            
            <a href="{{ route('wishlists.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow-sm hover:shadow transition-all text-sm font-medium">
                + Novo item
            </a>
        </div>

        <div class="grid grid-cols-3 gap-6">
            
            @foreach($wishlists as $wishlist)
                <div class="bg-white border border-pink-300 rounded-lg shadow-sm h-80 flex flex-col overflow-hidden">
                    
                    <div class="h-48 w-full bg-gray-100 border-b border-gray-100 relative">
                        @if($wishlist->image)
                            <img src="{{ asset('storage/' . $wishlist->image) }}" alt="{{ $wishlist->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                                Sem imagem
                            </div>
                        @endif
                    </div>

                    <div class="p-4 flex flex-col flex-grow justify-between">
                        
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            {{ $wishlist->name }}
                        </h3>

                        <div class="pt-3 border-t border-gray-100 flex justify-between items-center mt-2">
                            
                            <a href="{{ route('wishlists.edit', $wishlist) }}" class="text-pink-600 hover:text-pink-800 text-sm font-medium transition-colors">
                                Editar
                            </a>

                            <form action="{{ route('wishlists.destroy', $wishlist) }}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="text-xs text-gray-400 hover:text-red-500 font-medium transition-colors" onclick="return confirm('Tem certeza que deseja deletar?')">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </main>
</body>
</html>