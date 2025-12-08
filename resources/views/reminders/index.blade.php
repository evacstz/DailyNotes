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
        body {
            font-family: 'Montserrat', sans-serif;
        }
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
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-700 font-bold ">Lembretes</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border border-pink-600 rounded-md px-4 py-1 text-pink-600 hover:bg-pink-50 hover:text-pink-800 transition-colors font-bold text-sm">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-normal text-gray-900">Lembretes</h1>
            <a href="{{ route('reminders.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow-sm hover:shadow transition-all text-sm font-medium">
                + Novo lembrete
            </a>
        </div>

        <div class="space-y-4">
            @foreach($reminders as $reminder)
                <div class="bg-white border border-pink-300 rounded-lg p-4 flex justify-between items-center shadow-sm">            
                    <div class="flex-1 pr-4">
                        <h3 class="text-lg font-medium text-gray-900 break-words">
                            {{ $reminder->text }}
                        </h3>
                        
                        <div class="mt-1 text-sm text-gray-500">
                            <span class="font-semibold text-pink-600">Horário:</span> {{ $reminder->time }}
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('reminders.edit', $reminder) }}" class="text-sm font-medium text-gray-500 hover:text-pink-600 transition-colors">
                            Editar
                        </a>

                        <form action="{{ route('reminders.destroy', $reminder) }}" method="post" class="inline-block">
                            @method("delete")
                            @csrf
                            <button type="submit" class="text-sm font-medium text-gray-500 hover:text-red-500 transition-colors" onclick="return confirm('Tem certeza que deseja deletar?')">
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