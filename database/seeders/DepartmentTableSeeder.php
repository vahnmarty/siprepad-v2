<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Academics',
                'authorized_person' => 'Danielle Devencenzi',
                'email' => 'ddevencenzi@siprep.org',
            ],
            [
                'name' => 'Athletics',
                'authorized_person' => 'John Mulkerrins',
                'email' => 'jmulkerrins@siprep.org',
            ],
            [
                'name' => 'Book Purchases',
                'authorized_person' => 'Mike Ugawa',
                'email' => 'mugawa@siprep.org',
            ],
            [
                'name' => 'Financial Assistance',
                'authorized_person' => 'Sharon Aline Brannen',
                'email' => 'sbrannen@siprep.org',
            ],
            [
                'name' => 'iPads Educational Apps and Technical Specs',
                'authorized_person' => 'Jamie Pruden',
                'email' => 'jpruden@siprep.org',
            ],
            [
                'name' => 'iPads for Financial Aid Recipients',
                'authorized_person' => 'Sharon Aline Brannen',
                'email' => 'sbrannen@siprep.org',
            ],
            [
                'name' => 'Library',
                'authorized_person' => 'Christina Wenger',
                'email' => 'cwenger@siprep.org',
            ],
            [
                'name' => 'Magis Program',
                'authorized_person' => 'Maricel Hernandez',
                'email' => 'mhernandez@siprep.org',
            ],
            [
                'name' => 'Placement Exams',
                'authorized_person' => 'Jeannie Quesada',
                'email' => 'jquesada@siprep.org',
            ],
            [
                'name' => 'SFUSD Health Form',
                'authorized_person' => 'Katie Kohmann',
                'email' => 'kkohmann@siprep.org',
            ],
            [
                'name' => 'Student Affairs/Activities',
                'authorized_person' => 'Jeff Glosser',
                'email' => 'jglosser@siprep.org',
            ],
            [
                'name' => 'Summer Programs',
                'authorized_person' => 'Betsy Mora',
                'email' => 'summerprograms@siprep.org',
            ],
            [
                'name' => 'Summer School',
                'authorized_person' => 'Bill Gotch',
                'email' => 'bgotch@siprep.org',
            ],
            [
                'name' => 'Technology Onboarding',
                'authorized_person' => 'SI Librarians',
                'email' => 'si_librarians@siprep.org',
            ],
            [
                'name' => 'Ticket to Play Medical Form for Athletics',
                'authorized_person' => 'Josh Pendleton',
                'email' => 'jpendleton@siprep.org',
            ],
            [
                'name' => 'Transportation/Tuition/CYO Bus',
                'authorized_person' => 'Kathleen McKeon',
                'email' => 'kmckeon@siprep.org',
            ],
            [
                'name' => 'Registration Website Issues',
                'authorized_person' => 'Ramil Ferro',
                'email' => 'rferro@siprep.org',
            ]
        ];

        foreach($departments as $dept)
        {
            Department::firstOrCreate($dept);
        }
    }
}
