<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::truncate();

        School::create(['name' => 'Not Listed']);

        $file = database_path('imports/schools.csv');

        $handle = fopen($file, 'r');

        // Skip the first line
        fgetcsv($handle);

        // Loop through the remaining lines
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {

            $name = $data[1];

            $category = School::firstOrCreate([ 'name' => $name ]);
        }
    }
}
