<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function kategorie()
    {
        return view('kategorie');
    }
    public function bajki()
    {
        return view('bajki');
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
}