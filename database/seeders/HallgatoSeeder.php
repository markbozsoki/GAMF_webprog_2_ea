<?php

namespace Database\Seeders;

use App\Models\Hallgato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallgatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Hallgato::truncate();
        $csvFile = fopen(base_path('database/csv_sources/hallgato.csv'), 'r');
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, '	')) !== false) {
            if (! $isFirstLine) {
                Hallgato::create([
                    'nev' => $data['1'],
                    'osztondijas' => $data['2'],
                    'kar_id' => $data['3'],
                ]);
            }
            $isFirstLine = false;
        }
        fclose($csvFile);
    }
}
