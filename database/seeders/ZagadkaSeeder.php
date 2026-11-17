<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zagadka;

class ZagadkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zagadki = require resource_path('data/bajki.php');

        foreach ($zagadki as $zagadka) {
            Zagadka::updateOrCreate(
                ['emoji' => $zagadka['emoji']],
                ['odpowiedz' => $zagadka['odpowiedz']]
            );
        }
    }
}
