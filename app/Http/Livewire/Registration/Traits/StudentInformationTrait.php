<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\School;
use App\Enums\RaceType;
use App\Models\Student;
use App\Enums\ShirtSize;
use App\Enums\GenderType;
use App\Enums\ReligionType;
use App\Enums\SuffixOption;
use App\Enums\PerformingArtsType;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use App\Forms\Components\CustomWizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;

trait StudentInformationTrait{

    protected $student_columns = ['first_name', 'middle_name', 'last_name', 'suffix', 'preferred_first_name', 'birthdate']; 
    public $s1_id, $s1_first_name, $s1_middle_name, $s1_last_name, $s1_suffix, $s1_birthdate, $s1_preferred_first_name;
    public $s2_id, $s2_first_name, $s2_middle_name, $s2_last_name, $s2_suffix, $s2_birthdate, $s2_preferred_first_name;
    public $s3_id, $s3_first_name, $s3_middle_name, $s3_last_name, $s3_suffix, $s3_birthdate, $s3_preferred_first_name;

    public function mountStudents()
    {
        foreach(Auth::user()->students as $s => $student)
        {

        }
    }

    public function getStudentForm()
    {
        $tabs = [];

        foreach(range(1,3) as $s)
        {
            $tab = Tab::make('Student ' . $s)
                ->icon('heroicon-s-user') 
                ->columns(2)
                ->schema([
                    Hidden::make("s{$s}_id"),
                    TextInput::make("s{$s}_first_name")->label('First Name')->required(),
                    TextInput::make("s{$s}_middle_name")->label('Middle Name'),
                    TextInput::make("s{$s}_last_name")->label('Last Name')->required(),
                    Select::make("s{$s}_suffix")->label('Suffix')->options(SuffixOption::asSelectArray()),
                    TextInput::make("s{$s}_preferred_first_name")->label('Preffered First Name'),
                    DatePicker::make("s{$s}_birthdate")->format('Y-m-d')->label('Date of Birth')->required(),
                    Select::make("s{$s}_gender")->label('Gender')->options(GenderType::asSelectArray()),
                    TextInput::make("s{$s}_mobile_phone")
                        ->label('Mobile Phone')
                        ->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                    TextInput::make("s{$s}_personal_email")->label('Student (or Parent) Email')->email(),
                    Select::make("s{$s}_religion")->label('Religion')->options(ReligionType::asSelectArray()),
                    Select::make("s{$s}_race")
                        ->label('How do you identify racially?  Select more than one, if applicable.')
                        ->multiple()->options(RaceType::asSelectArray())
                        ->columnSpan('full')
                        ->nullable(),
                    TextInput::make("s{$s}_ethnicity")
                        ->label('What is your ethnicity?  If more than one, separate ethnicities with a comma.  Example:  "Filipino, Hawaiian, Irish, Italian, Lebanese, Eritrean, Salvadorian"')
                        ->columnSpan('full')
                        ->nullable(),
                    Select::make("s{$s}_current_school")
                        ->label('Current School')
                        ->options(School::get()->pluck('name', 'id'))
                        ->default(1),
                    TextInput::make("s{$s}_other_school")
                        ->label('If current shoot is not listed, please input your current school')
                        ->nullable(),
                    Select::make("s{$s}_shirt_size")
                        ->label('T-Shirt Size (Adult/Unisex)')
                        ->options(ShirtSize::asSelectArray()),
                    Radio::make("s{$s}_performing_arts")
                        ->label('Would you be interested in joining any of our performing arts programs?')
                        ->reactive()
                        ->options(['No', 'Yes']),
                    Select::make("s{$s}_performing_arts_type")
                        ->label('How do you identify racially?  Select more than one, if applicable.')
                        ->multiple()->options(PerformingArtsType::asSelectArray())
                        ->columnSpan('full')
                        ->reactive()
                        ->visible(fn(Closure $get)=> $get("s{$s}_performing_arts") === 1)
                        ->nullable(),
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Heading')->tabs($tabs);
    }

    public function saveStudents()
    {
        $user = Auth::user();
        $columns = $this->student_columns;

        foreach(range(1, self::MAX) as $s)
        {
            $data = [];

            foreach($columns as $column)
            {
                $field = "s{$s}_" . $column;
                $data[$column] = $this->$field;
            }

            $user->students()->create($data);
        }
    }

}