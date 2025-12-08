<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes</title>
</head>
<body>
    <h1>Editar evento</h1>

    <form action="{{ route('events.update', $event) }}" method="post">
        @method("put")
        @csrf
        <label for="title">Evento:</label>
        <input type="text" name="title" value="{{ $event->title }}">

        <label for="date">Data:</label>
        <input type="date" name="date" value="{{ $event->date }}">

        <label for="time">Hora:</label>
        <input type="time" name="time" value="{{ $event->time }}">

        <input type="submit" value="Salvar alterações">
    </form>

    <a href="{{ route('events.index') }}">Voltar</a>
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
                    <a href="{{ route('events.index') }}" class="text-pink-700 font-bold">Eventos</a>
                    <a href="{{ route('checklists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lista de desejos</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white border border-pink-300 rounded-lg shadow-sm p-6 sm:p-8">            
            <h1 class="text-2xl font-bold text-gray-900 mb-6">EDITAR EVENTO</h1>
            
            <form action="{{ route('events.update', $event) }}" method="post" class="flex flex-col gap-6">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-sm font-semibold text-gray-700">Evento</label>
                    <input type="text" name="title" id="title" value="{{ $event->title }}" required class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">  
                    <div class="flex flex-col gap-2">
                        <label for="date" class="text-sm font-semibold text-gray-700">Data</label>
                        <input type="date" name="date" id="date" value="{{ $event->date }}" required class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="time" class="text-sm font-semibold text-gray-700">Hora</label>
                        <input type="time" name="time" id="time" value="{{ $event->time }}" required class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                    </div>
                </div>

                <div class="flex justify-between items-center pt-4 border-t border-gray-100 mt-2">
                    <a href="{{ route('events.index') }}" class="text-pink-600 hover:text-pink-800 font-medium transition-colors">Voltar</a>                    
                    <input type="submit" value="Salvar alterações" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-2 rounded shadow-sm hover:shadow transition-all font-medium cursor-pointer">
                </div>
            </form>
        </div>
    </main>
</body>
</html>