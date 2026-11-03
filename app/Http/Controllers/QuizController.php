<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function kategorie()
    {
        return view('kategorie');
    }

    public function bajki(Request $request)
    {
        if (!$request->session()->has('quiz_bajki')) {
            $pula = collect(require resource_path('data/bajki.php'));

            $pytania = $pula->shuffle()->take(5)->map(function ($zagadka) use ($pula) {
                $bledne = $pula
                    ->pluck('odpowiedz')
                    ->reject(fn ($tytul) => $tytul === $zagadka['odpowiedz'])
                    ->shuffle()
                    ->take(3);

                return [
                    'emoji' => $zagadka['emoji'],
                    'poprawna' => $zagadka['odpowiedz'],
                    'odpowiedzi' => $bledne
                        ->push($zagadka['odpowiedz'])
                        ->shuffle()
                        ->values()
                        ->all(),
                ];
            })->values()->all();

            $request->session()->put('quiz_bajki', [
                'pytania' => $pytania,
                'indeks' => 0,
                'punkty' => 0,
            ]);
        }

        $gra = $request->session()->get('quiz_bajki');

        if ($gra['indeks'] >= count($gra['pytania'])) {
            return view('wynik-bajki', [
                'punkty' => $gra['punkty'],
                'liczbaPytan' => count($gra['pytania']),
            ]);
        }

        return view('bajki', [
            'zagadka' => $gra['pytania'][$gra['indeks']],
            'numer' => $gra['indeks'] + 1,
            'liczbaPytan' => count($gra['pytania']),
            'gra' => $gra,
        ]);
    }

    public function kraj()
    {
        return view('kraj');
    }

    public function marki()
    {
        return view('marki');
    }

    public function zapiszGracza(Request $request)
    {
        $validated = $request->validate([
            'player_name' => ['required', 'string', 'max:30'],
        ]);

        $request->session()->put('player_name', $validated['player_name']);

        return redirect('/kategorie');
    }

    public function sprawdzBajke(Request $request)
    {
        $gra = $request->session()->get('quiz_bajki');

        if (!$gra || $gra['indeks'] >= count($gra['pytania'])) {
            return redirect('/quiz/bajki');
        }

        if (isset($gra['wybrana'])) {
            return redirect('/quiz/bajki');
        }

        $dane = $request->validate([
            'odpowiedz' => ['required', 'integer', 'between:0,3'],
        ]);

        $pytanie = $gra['pytania'][$gra['indeks']];
        $wybrana = $pytanie['odpowiedzi'][(int) $dane['odpowiedz']];

        $gra['wybrana'] = $wybrana;
        $gra['czy_poprawna'] = $wybrana === $pytanie['poprawna'];

        if ($gra['czy_poprawna']) {
            $gra['punkty']++;
        }

        $request->session()->put('quiz_bajki', $gra);

        return redirect('/quiz/bajki');
    }

    public function nastepnaBajka(Request $request)
    {
        $gra = $request->session()->get('quiz_bajki');

        if ($gra && isset($gra['wybrana'])) {
            $gra['indeks']++;
            unset($gra['wybrana'], $gra['czy_poprawna']);

            $request->session()->put('quiz_bajki', $gra);
        }

        return redirect('/quiz/bajki');
    }

    public function nowaGraBajki(Request $request)
    {
        $request->session()->forget('quiz_bajki');

        return redirect('/quiz/bajki');
    }
}