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
                    <a href="{{ route('checklists.index') }}" class="text-pink-700 font-bold">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>

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
            <h1 class="text-2xl font-normal text-gray-900">Checklists</h1>
            
            <a href="{{ route('checklists.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow-sm hover:shadow transition-all text-sm font-medium">
                + Nova lista
            </a>
        </div>

        <div class="grid grid-cols-3 gap-6">
            
            @foreach($checklists as $checklist)
                <div class="bg-white border border-pink-300 rounded-lg p-4 shadow-sm h-32 flex flex-col justify-between relative overflow-hidden">
                    
                    <h3 class="text-lg font-semibold text-gray-900 line-clamp-2 leading-tight">
                        {{ $checklist->title }}
                    </h3>

                    <div class="pt-2 border-t border-gray-100 flex justify-between items-center">
                        
                        <a href="{{ route('checklists.show', $checklist) }}" class="text-pink-600 hover:text-pink-800 text-sm font-medium transition-colors">Ver lista</a>

                        <form action="{{ route('checklists.destroy', $checklist) }}" method="post">
                            @method("delete")
                            @csrf
                            <button type="submit" class="text-xs text-gray-400 hover:text-red-500 font-medium transition-colors" onclick="return confirm('Tem certeza que deseja deletar esta lista?')">
                                Deletar
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </main>
</body>
</html>