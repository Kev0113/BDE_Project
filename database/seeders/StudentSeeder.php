<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::truncate();
        $csvData = fopen(base_path('database/Tableur_BDD_V2.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Student::create([
                    'nom' => $data[1],
                    'prenom' => $data[2],
                    'emailUniv' => $data[3],
                    'identifiant' => $data[4]
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
