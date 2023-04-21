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
use App\Http\Livewire\Registration\Traits\AccommodationTrait;
use App\Http\Livewire\Registration\Traits\EmergencyContactTrait;
use App\Http\Livewire\Registration\Traits\HealthInformationTrait;
use App\Http\Livewire\Registration\Traits\ParentInformationTrait;
use App\Http\Livewire\Registration\Traits\AddressInformationTrait;
use App\Http\Livewire\Registration\Traits\StudentInformationTrait;

class RegistrationWizard extends Component implements HasForms
{
    use InteractsWithForms;

    use StudentInformationTrait, 
        AddressInformationTrait,
        ParentInformationTrait,
        HealthInformationTrait,
        EmergencyContactTrait,
        AccommodationTrait;

    const MAX=3;

    public function render()
    {
        return view('livewire.registration-wizard');
    }

    public function mount()
    {
        $this->mountStudents();
        $this->mountAddress();
        $this->mountParents();
        $this->mountHealth();
        $this->mountAccommodation();
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
                    ->schema($this->getAddressForm())
                    ->afterValidation(function(){
                        $this->saveAddress();
                    }),
                Step::make('Parent')
                    ->schema([$this->getParentsForm()])
                    ->afterValidation(function(){
                        $this->saveParents();
                    }),
                Step::make('Health')
                    ->schema($this->getHealthForm())
                    ->afterValidation(function(){
                        $this->saveHealth();
                    }),
                Step::make('Emergency')
                    ->schema($this->getEmergencyContactForm())
                    ->afterValidation(function(){
                        $this->saveEmergencyContactForm();
                    }),
                Step::make('Accommodations')
                    ->schema([$this->getAccommodationForm()])
                    ->afterValidation(function(){
                        $this->saveAccommodations();
                    }),
                Step::make('Magis Program')
                    ->schema([
                        // ...
                    ]),
                Step::make('Course')
                    ->schema([
                        // ...
                    ]),
            ])->startOnStep(6)
        ];
    }

    
}
