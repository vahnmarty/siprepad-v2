<?php

namespace App\Http\Livewire;

use Auth;
use Closure;
use App\Models\School;
use App\Enums\RaceType;
use App\Models\Student;
use Livewire\Component;
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
use Filament\Forms\Concerns\InteractsWithForms;
use App\Http\Livewire\Registration\Traits\StudentInformationTrait;

class RegistrationWizard extends Component implements HasForms
{
    use InteractsWithForms;

    use StudentInformationTrait;

    const MAX=3;

    public function render()
    {
        return view('livewire.registration-wizard');
    }

    public function mount()
    {
        $this->mountStudents();
    }

    protected function getFormSchema(): array
    {
        
        return [
            CustomWizard::make([
                Step::make('Student')
                    ->schema([$this->getStudentForm()])
                    ->afterValidation(function(){
                        $this->saveStudents();
                    }),
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

    
}
