<?php

namespace Database\Seeders;

use App\Models\Masolas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasolasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Masolas::truncate();
        $csvFile = fopen(base_path('database/csv_sources/masolas.csv'), 'r');
        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, '	')) !== false) {
            if (! $isFirstLine) {
                Masolas::create([
                    'hallgato_id' => $data['1'],
                    'datum' => $data['2'],
                    'lap' => $data['3'],
                    'oldal' => $data['4'],
                ]);
            }
            $isFirstLine = false;
        }
        fclose($csvFile);
    }
}
