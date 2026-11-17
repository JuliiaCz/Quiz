<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Bajki w emoji — Złoty Gral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('gra.css') }}">
</head>
<body>
    <main class="karta">
        <h1>Bajki w emoji</h1>
        <p>Odgadnij bajkę na podstawie emoji!</p>

        <p>Pytanie {{ $numer }} z {{ $liczbaPytan }}</p>
        <p class="emoji">{{ $zagadka['emoji'] }}</p>

        @if (isset($gra['wybrana']))
            <p>Twoja odpowiedź: {{ $gra['wybrana'] }}</p>

            @if ($gra['czy_poprawna'])
                <p>✅ Dobra odpowiedź!</p>
            @else
                <p>❌ Błędna odpowiedź.</p>
                <p>Poprawna odpowiedź: {{ $zagadka['poprawna'] }}</p>
            @endif

            <form action="/quiz/bajki/nastepne" method="POST">
                @csrf
                <button type="submit">
                    {{ $numer === $liczbaPytan ? 'Zobacz wynik' : 'Następne pytanie' }}
                </button>
            </form>
        @else
            <form action="/quiz/bajki/odpowiedz" method="POST">
                @csrf

                @foreach ($zagadka['odpowiedzi'] as $indeks => $odpowiedz)
                    <p>
                        <label class="odpowiedz">
                            <input
                                type="radio"
                                name="odpowiedz"
                                value="{{ $indeks }}"
                                required
                            >
                            {{ $odpowiedz }}
                        </label>
                    </p>
                @endforeach

                @error('odpowiedz')
                    <p>Wybierz jedną z dostępnych odpowiedzi.</p>
                @enderror

                <button type="submit">Sprawdź odpowiedź</button>
            </form>
        @endif

        <p>Punkty: {{ $gra['punkty'] }}</p>

        <a href="/kategorie">Wróć do kategorii</a>
    </main>
</body>
</html>