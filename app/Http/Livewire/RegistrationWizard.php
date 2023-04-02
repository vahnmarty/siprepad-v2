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

    public $birthdate;
    
    public function render()
    {
        return view('livewire.registration-wizard');
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
                    TextInput::make('first_name')->required(),
                    TextInput::make('middle_name'),
                    TextInput::make('last_name')->required(),
                    Select::make('suffix')->options(SuffixOption::asArray()),
                    TextInput::make('preferred_first_name'),
                    DatePicker::make('birthdate')
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Heading')->tabs($tabs);
    }
}
