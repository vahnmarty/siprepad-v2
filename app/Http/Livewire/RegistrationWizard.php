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
use Illuminate\Support\HtmlString;
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
use App\Http\Livewire\Registration\Traits\MagisProgramTrait;
use App\Http\Livewire\Registration\Traits\AccommodationTrait;
use App\Http\Livewire\Registration\Traits\CoursePlacementTrait;
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
        AccommodationTrait,
        MagisProgramTrait,
        CoursePlacementTrait;

    public $last_step = 1;

    public function render()
    {
        return view('livewire.registration-wizard');
    }

    public function mount()
    {
        # Traits
        $this->mountStudents();
        $this->mountAddress();
        $this->mountParents();
        $this->mountHealth();
        $this->mountEmergency();
        $this->mountAccommodation();
        $this->mountMagisProgram();
        $this->mountCoursePlacement();


        # Functions
        $this->getLastStep();
    }

    public function getLastStep()
    {
        $user = Auth::user();

        if($user->students()->count() <= 0){
            $this->last_step = 1;
        }elseif($user->address()->count() <= 0){
            $this->last_step = 2;
        }elseif($user->parents()->count() <= 0){
            $this->last_step = 3;
        }elseif($user->health()->count() <= 0){
            $this->last_step = 4;
        }elseif($user->emergency_contact()->count() <= 0){
            $this->last_step = 5;
        }elseif($user->accommodations()->count() <= 0){
            $this->last_step = 6;
        }elseif($user->magisProgram()->count() <= 0){
            $this->last_step = 7;
        }elseif($user->coursePlacements()->count() <= 0){
            $this->last_step = 8;
        }
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
                    ->schema($this->getMagisProgramForm())
                    ->afterValidation(function(){
                        $this->saveMagisProgram();
                    }),
                Step::make('Course')
                    ->schema([$this->getCoursePlacementForm()])
                    ->afterValidation(function(){
                        $this->saveCoursePlacement();
                    }),
            ])
            ->startOnStep(8)
            ->submitAction(new HtmlString('<button type="submit" class="btn-primary">Submit</button>'))
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $this->saveCoursePlacement();

        return redirect()->route('registration.complete');
    }

    
}
