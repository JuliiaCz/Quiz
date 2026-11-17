<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Złoty Gral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('gra.css') }}">
</head>
<body>
    <main class="karta">
        <h1>Witaj w grze Złoty Gral!</h1>
        <p>Rozwiązuj zagadki obrazkowe!</p>

        <form action="/gracz" method="POST">
            @csrf

            <label for="player_name">Twój pseudonim:</label>
            <input
                type="text"
                id="player_name"
                name="player_name"
                required
                maxlength="30"
            >

            @error('player_name')
                <p>{{ $message }}</p>
            @enderror

            <button type="submit">Zagraj — wybierz kategorię</button>
        </form>
    </main>
</body>
</html>