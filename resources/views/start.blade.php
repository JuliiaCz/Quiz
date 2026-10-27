<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Złoty Gral</title>
</head>
<body>
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

        <button type="submit">Zagraj — wybierz kategorię</button>
    </form>
</body>
</html>