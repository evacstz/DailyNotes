<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar nova nota</title>
</head>
<body>
    <h1>Criar nova nota</h1>

    <form action="{{ route('notes.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Título">
        <input type="text" name="text" placeholder="Escreva algo...">
        <input type="submit" value="Salvar">
    </form>
</body>
</html>