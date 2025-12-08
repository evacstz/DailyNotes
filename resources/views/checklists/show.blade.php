<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>  
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
                    <a href="{{ route('checklists.index') }}" class="text-pink-700 font-bold">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-4">

        <div class="flex justify-between items-end mb-6 border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $checklist->title }}</h1>
            </div>
            <a href="{{ route('checklists.edit', $checklist) }}" class="bg-pink-600 hover:bg-pink-700 text-white text-sm px-8 py-2 rounded shadow-sm hover:shadow transition-all font-medium cursor-pointer">Editar lista</a>
        </div>

        <ul class="space-y-1">
            @foreach($checklist->items as $item)
                <li class="group flex items-center justify-between py-3 border-b border-gray-100 px-2 rounded transition-colors">
                    <div class="flex items-center gap-4 flex-grow">
                        <form action="{{ route('items.toggle', $item) }}" method="POST" class="flex items-center">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" onchange="this.form.submit()" class="w-5 h-5 border-gray-300 rounded cursor-pointer" {{ $item->concluido ? 'checked' : '' }}>
                        </form>

                        <span class="text-lg {{ $item->concluido ? 'line-through text-gray-400' : 'text-gray-800' }}">{{ $item->text }}</span>
                    </div>

                    <form action="{{ route('items.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm font-medium text-gray-300 group-hover:text-red-500 transition-colors cursor-pointer" onclick="return confirm('Tem certeza que deseja deletar este item?')">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="mt-10 pt-6 border-t border-gray-200 flex justify-end">
            <a href="{{ route('checklists.index') }}" class="text-pink-600 hover:text-pink-800 font-medium transition-colors"">Voltar</a>
        </div>
    </main>
</body>
</html>