<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\SchoolTerm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentYear = Carbon::now()->year;

        // Create school terms for the current year and the next two upcoming years
        for ($i = 0; $i < 10; $i++) {
            $year = $currentYear + $i;

            $termNames = [
                'Fall',
                'Spring',
                'Summer'
            ];

            foreach ($termNames as $termName) {
                SchoolTerm::firstOrCreate([
                    'name' => $termName . ' ' . $year,
                    'start_date' => $this->getStartDate($termName, $year),
                    'end_date' => $this->getEndDate($termName, $year),
                    'active' => false,
                    'start_year' => $year,
                    'end_year' => $year,
                ]);
            }
        }
    }

    /**
     * Calculate the start date for a given term and year
     *
     * @param string $termName
     * @param int $year
     * @return Carbon
     */
    private function getStartDate($termName, $year)
    {
        switch ($termName) {
            case 'Fall':
                return Carbon::create($year, 9, 1)->startOfDay();
            case 'Spring':
                return Carbon::create($year + 1, 1, 1)->startOfDay();
            case 'Summer':
                return Carbon::create($year, 5, 1)->startOfDay();
        }
    }

    /**
     * Calculate the end date for a given term and year
     *
     * @param string $termName
     * @param int $year
     * @return Carbon
     */
    private function getEndDate($termName, $year)
    {
        switch ($termName) {
            case 'Fall':
                return Carbon::create($year + 1, 1, 1)->startOfDay();
            case 'Spring':
                return Carbon::create($year + 1, 5, 1)->startOfDay();
            case 'Summer':
                return Carbon::create($year, 9, 1)->startOfDay();
        }
    }
}
