<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <h1>DailyNotes</h1>
    <h3>Notas</h3>

     @foreach($notes as $note)
        <div style="border: 1px solid black; margin-bottom: 10px; padding: 5px;">
            <h3>{{ $note->title }}</h3>
            <p>{{ $note->text }}</p>
        </div>
    @endforeach
</body>
</html>