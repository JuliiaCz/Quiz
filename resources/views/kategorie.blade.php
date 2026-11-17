<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategorie — Złoty Gral</title>
    <link rel="stylesheet" href="{{ asset('gra.css') }}">
</head>
<body>
    <main class="karta">
        <h1>Wybierz kategorię</h1>

        <ul class="kategorie">
            <li>
                <a href="/quiz/bajki">
                    <span aria-hidden="true"></span>
                    Bajki w emoji
                    <small>Odgadnij tytuł bajki z emoji.</small>
                </a>
            </li>
            <li>
                <a href="/quiz/kraj">
                    <span aria-hidden="true"></span>
                    Rozpoznaj kraj
                    <small>Odgadnij kraj na podstawie zdjęcia.</small>
                </a>
            </li>
            <li>
                <a href="/quiz/marki">
                    <span aria-hidden="true"></span>
                    Co to za marka?
                    <small>Rozpoznaj markę po logo.</small>
                </a>
            </li>
        </ul>

        <a href="/">← Wróć do menu głównego</a>
    </main>
</body>
</html>