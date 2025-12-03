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
                    <a href="{{ route('notes.index') }}" class="text-pink-700 font-bold">Notas</a>
                    <a href="{{ route('events.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Eventos</a>
                    <a href="{{ route('checklists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-4">

        <div class="bg-white border border-pink-300 rounded-lg shadow-sm p-8 min-h-[400px] flex flex-col">
            
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 break-words">
                    {{ $note->title }}
                </h1>
            </div>

            <hr class="border-gray-200 mb-6">

            <div class="text-gray-600 text-lg leading-relaxed flex-grow break-words">
                {{ $note->text }}
            </div>

            <div class="mt-10 pt-6 border-t border-gray-50 flex justify-between items-center">
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('notes.edit', $note) }}" class="text-sm font-medium text-gray-500 hover:text-pink-600 transition-colors">
                        Editar
                    </a>

                    <form action="{{ route('notes.destroy', $note) }}" method="post" class="inline-block">
                        @method("delete")
                        @csrf
                        <input type="submit" value="Deletar" class="text-sm font-medium text-gray-500 hover:text-red-500 transition-colors cursor-pointer bg-transparent border-0" onclick="return confirm('Tem certeza que deseja deletar?')">
                    </form>
                </div>

                <a href="{{ route('notes.index') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow-sm hover:shadow transition-all text-sm font-medium">
                    Voltar
                </a>

            </div>

        </div>

    </main>
</body>
</html>