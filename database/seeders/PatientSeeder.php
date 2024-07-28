<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('patients')->insert([
            ['name' => 'John Doe', 'birthdate' => '1980-01-01', 'disease' => 'Disease A', 'medication' => 'Medication X'],
            // Agrega más registros según sea necesario
        ]);
    }
}  