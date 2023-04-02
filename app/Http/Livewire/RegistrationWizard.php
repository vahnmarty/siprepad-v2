<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Enums\SuffixOption;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use App\Forms\Components\CustomWizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;

class RegistrationWizard extends Component implements HasForms
{
    use InteractsWithForms;

    # Student
    public $s1_first_name, $s1_middle_name, $s1_last_name, $s1_suffix, $s1_birthdate, $s1_preferred_first_name;
    public $s2_first_name, $s2_middle_name, $s2_last_name, $s2_suffix, $s2_birthdate, $s2_preferred_first_name;
    public $s3_first_name, $s3_middle_name, $s3_last_name, $s3_suffix, $s3_birthdate, $s3_preferred_first_name;


    public function render()
    {
        return view('livewire.registration-wizard');
    }

    public function mount()
    {
        
    }

    protected function getFormSchema(): array
    {
        
        return [
            CustomWizard::make([
                Step::make('Student')
                    ->schema([$this->getStudentForm()]),
                Step::make('Address')
                    ->schema([
                        // ...
                    ]),
                Step::make('Parent')
                    ->schema([
                        // ...
                    ]),
                Step::make('Health')
                    ->schema([
                        // ...
                    ]),
                Step::make('Emergency')
                    ->schema([
                        // ...
                    ]),
                Step::make('Accommodations')
                    ->schema([
                        // ...
                    ]),
                Step::make('Magis Program')
                    ->schema([
                        // ...
                    ]),
                Step::make('Course')
                    ->schema([
                        // ...
                    ]),
            ])
        ];
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
                    TextInput::make("s{$s}_first_name")->required(),
                    TextInput::make("s{$s}_middle_name"),
                    TextInput::make("s{$s}_last_name")->required(),
                    Select::make("s{$s}_suffix")->options(SuffixOption::asArray()),
                    TextInput::make("s{$s}_preferred_first_name"),
                    DatePicker::make("s{$s}_birthdate")->required()
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Heading')->tabs($tabs);
    }
}
