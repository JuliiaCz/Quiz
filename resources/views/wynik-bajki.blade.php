<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik — Złoty Gral</title>
</head>
<body>
    <h1>Koniec gry!</h1>
    <p>Twój wynik: {{ $punkty }} / {{ $liczbaPytan }}</p>

    <form action="/quiz/bajki/nowa" method="POST">
        @csrf
        <button type="submit">Zagraj ponownie</button>
    </form>

    <p><a href="/kategorie">Wróć do kategorii</a></p>
</body>
</html>