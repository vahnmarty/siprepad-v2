<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Health;
use App\Models\Address;
use App\Enums\AddressType;
use App\Enums\RelationshipType;
use App\Models\EmergencyContact;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait AccommodationTrait{

    public $s1_receive_formal, $s1_receive_informal;
    public $s2_receive_formal, $s2_receive_informal;

    public function mountAccommodation()
    {
        $user = Auth::user();
        $students = $user->students;

        foreach($students as $i =>  $student)
        {
            $s = $i+1;

            if($student->accommodation)
            {
                $this->{"s{$s}_receive_formal"} = $student->accommodation->receive_formal;
                $this->{"s{$s}_receive_informal"} = $student->accommodation->receive_informal;
            }
        }
    }

    public function getAccommodationForm()
    {
        $tabs = [];

        foreach(Auth::user()->students as $i =>  $student)
        {
            $s = $i+1;
            
            $tab = Tab::make('Student ' . $s)
                ->icon('heroicon-s-user') 
                ->columns(2)
                ->schema([
                    Section::make("Student {$s}: " . $student->first_name)
                        ->schema([
                            Radio::make("s{$s}_receive_formal")
                                ->required()
                                ->label('Does the student receive formal academic accommodations at their current school (Learning Plan, IEP, 504 Plan, Other)?')
                                ->boolean(),
                            Radio::make("s{$s}_receive_informal")
                                ->required()
                                ->label('Does the student receive informal academic accommodations at their current school (e.g., extended time, preferred seating)?')
                                ->boolean(),
                        ])
                    
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Accomodations')->tabs($tabs);
    }

    public function saveAccommodations()
    {
        $user = Auth::user();
        $students = $user->students;

        foreach($students as $i => $student)
        {
            $s = $i+1;

            $receive_formal_field = "s{$s}_receive_formal";
            $receive_informal_field = "s{$s}_receive_informal";

            $data = [
                'receive_formal' => $this->$receive_formal_field,
                'receive_informal' => $this->$receive_informal_field
            ];

            if($student->accommodation){
                $student->accommodation()->update($data);
            }else{
                $data['user_id'] = $user->id;
                $student->accommodation()->create($data);
            }
        }
    }
}