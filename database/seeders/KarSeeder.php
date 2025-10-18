<?php

namespace Database\Seeders;

use App\Models\Kar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Kar::truncate();
        $csvFile = fopen(base_path('database/csv_sources/kar.csv'), 'r');
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, '	')) !== false) {
            if (! $isFirstLine) {
                Kar::create([
                    'nev' => $data['1'],
                    'kvota' => $data['2'],
                ]);
            }
            $isFirstLine = false;
        }
        fclose($csvFile);
    }
}
