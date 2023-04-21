<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Health;
use App\Models\Address;
use App\Enums\AddressType;
use App\Enums\RelationshipType;
use App\Models\EmergencyContact;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait EmergencyContactTrait{

    public $name, $relationship, $home_phone, $mobile_phone, $work_phone;

    public function mountEmergency()
    {
        $user = Auth::user();
        $emergency_contact = $user->emergency_contact;

        if($emergency_contact){
            $this->name = $emergency_contact->name;
            $this->relationship = $emergency_contact->relationship;
            $this->home_phone = $emergency_contact->home_phone;
            $this->mobile_phone = $emergency_contact->mobile_phone;
            $this->work_phone = $emergency_contact->work_phone;
        }

    }

    public function getEmergencyContactForm()
    {
        return [
            Section::make('Emergency Contact Details')
                ->schema([
                    TextInput::make('name')->columnSpan('full')->required(),
                    Select::make('relationship')
                        ->options(RelationshipType::asSelectArray())
                        ->columnSpan('full')
                        ->required(),
                    TextInput::make("home_phone")
                        ->tel()
                        ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                        ->required(),
                    TextInput::make("mobile_phone")
                        ->tel()
                        ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                        ->required(),
                    TextInput::make("work_phone")
                        ->tel()
                        ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                        ->required(),
                ])
            
        ];
    }

    public function saveEmergencyContactForm()
    {
        $user = Auth::user();

        EmergencyContact::updateOrCreate([
            'user_id' => $user->id,
        ],
        [   
            'name' => $this->name,
            'relationship' => $this->relationship,
            'home_phone' => $this->home_phone,
            'mobile_phone' => $this->mobile_phone,
            'work_phone' => $this->work_phone,
        ]);
    }
}