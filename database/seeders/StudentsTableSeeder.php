<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RaceType;
use App\Models\Student;
use App\Enums\ShirtSize;
use App\Enums\EthnicType;
use App\Enums\ReligionType;
use Illuminate\Database\Seeder;
use App\Enums\PerformingArtsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::whereEmail('user1@app.com')->first();
        
        if($user1){
            $this->createStudent($user1, $max = 1);
        }

        $user2 = User::whereEmail('user2@app.com')->first();
        
        if($user2){
            $this->createStudent($user2, $max = 2);
        }

        $user3 = User::whereEmail('user3@app.com')->first();
        
        if($user3){
            $this->createStudent($user3, $max = 3);
        }
    }

    public function createStudent(User $user, $max = 3)
    {
        $limit = $max - $user->students()->count();

        if($limit > 0 )
        {
            foreach(range(1,$max) as $num)
            {
                $student = new Student;
                $student->user_id  = $user->id;
                $student->first_name = fake()->firstName();
                $student->middle_name = fake()->firstName();
                $student->last_name = fake()->lastName();
                $student->birthdate = fake()->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
                $student->gender = rand(0,1);
                $student->personal_email = fake()->freeEmail();
                $student->mobile_phone = fake()->phoneNumber();
                $student->religion = ReligionType::getRandomValue();
                $student->race = RaceType::getRandomValue();
                $student->ethnicity = EthnicType::getRandomValue();
                $student->current_school = "Grange Middle School";
                //$student->other_school = "Balboa High School";
                $student->shirt_size = ShirtSize::getRandomValue();
                $student->is_performing_arts = 1;
                $student->performing_arts_type = PerformingArtsType::getRandomValue();
                $student->save();
            }
        }
    }
}

