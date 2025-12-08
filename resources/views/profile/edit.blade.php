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
                    <a href="{{ route('checklists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Checklists</a>
                    <a href="{{ route('wishlists.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Wishlists</a>
                    <a href="{{ route('reminders.index') }}" class="text-pink-600 hover:text-pink-800 transition-colors">Lembretes</a>
                    
                    <a href="{{ route('profile.edit') }}" class="text-pink-700 font-bold">Perfil</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border border-pink-600 rounded-md px-4 py-1 text-pink-600 hover:bg-pink-50 hover:text-pink-800 transition-colors font-bold text-sm">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-10 px-4 space-y-8">
        <div class="bg-white border border-pink-300 rounded-lg shadow-sm p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Informações do usuário</h2>
            <p class="text-sm text-gray-500 mb-6">Alterar nome ou e-mail</p>

            <form method="post" action="{{ route('profile.update') }}" class="flex flex-col gap-4">
                @csrf
                @method('patch')
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-sm font-semibold text-gray-700">Nome</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-semibold text-gray-700">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow-sm hover:shadow transition-all font-medium">Salvar alterações</button>
                </div>
            </form>
        </div>

        <div class="bg-white border border-pink-300 rounded-lg shadow-sm p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Alterar Senha</h2>

            <form method="post" action="{{ route('password.update') }}" class="flex flex-col gap-4">
                @csrf
                @method('put')
                <div class="flex flex-col gap-2">
                    <label for="current_password" class="text-sm font-semibold text-gray-700">Senha atual</label>
                    <input type="password" name="current_password" id="current_password" class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-sm font-semibold text-gray-700">Nova senha</label>
                        <input type="password" name="password" id="password" class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation" class="text-sm font-semibold text-gray-700">Confirmar nova senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-pink-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500 transition-colors">
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded shadow-sm hover:shadow transition-all font-medium">Salvar alterações</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>