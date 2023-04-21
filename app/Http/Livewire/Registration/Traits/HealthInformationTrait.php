<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Health;
use App\Models\Address;
use App\Enums\AddressType;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait HealthInformationTrait{

    public $medical_insurance_company, $medical_policy_number, $physician_name, $physician_phone, $prescribed_medications, $allergies, $other_issues;

    public function mountHealth()
    {
        $user = Auth::user();
        $health = $user->health;

        if($health){
            $this->medical_insurance_company = $health->medical_insurance_company;
            $this->medical_policy_number = $health->medical_policy_number;
            $this->physician_name = $health->physician_name;
            $this->physician_phone = $health->physician_phone;
            $this->prescribed_medications = $health->prescribed_medications;
            $this->allergies = $health->allergies;
            $this->other_issues = $health->other_issues;
        }

    }

    public function getHealthForm()
    {
        return [
            Section::make('Health Information')
                ->schema([
                    TextInput::make('medical_insurance_company')->columnSpan('full')->required(),
                    TextInput::make('medical_policy_number')->columnSpan('full')->required(),
                    TextInput::make('physician_name')->columnSpan('full')->required(),
                    TextInput::make('physician_phone')->columnSpan('full')->required(),
                    Textarea::make('prescribed_medications')
                        ->label('Prescribed Medications, Time and Dosages (If not applicable, type "N/A")')
                        ->columnSpan('full'),
                    Textarea::make('allergies')
                        ->label('Allergies (Drug, Food, etc.) and other Dietary Restrictions (If not applicable, type "N/A")')
                        ->columnSpan('full'),
                    Textarea::make('other_issues')
                        ->label('Please list anything that you would like to share with us regarding your child`s physical or mental health that we should know about in order to best support your child.  (If not applicable, type "N/A")')
                        ->columnSpan('full'),
                ])
            
        ];
    }

    public function saveHealth()
    {
        $user = Auth::user();

        Health::updateOrCreate([
            'user_id' => $user->id,
        ],
        [   
            'medical_insurance_company' => $this->medical_insurance_company,
            'medical_policy_number' => $this->medical_policy_number,
            'physician_name' => $this->physician_name,
            'physician_phone' => $this->physician_phone,
            'prescribed_medications' => $this->prescribed_medications,
            'allergies' => $this->allergies,
            'other_issues' => $this->other_issues,
        ]);
    }
}