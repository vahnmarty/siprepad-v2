<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Health;
use App\Models\Address;
use App\Enums\AddressType;
use App\Enums\RelationshipType;
use App\Models\EmergencyContact;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput\Mask;

trait MagisProgramTrait{

    public $is_first_generation;
    public $s1_interested, $s2_interested, $s3_interested;

    public function mountMagisProgram()
    {
        $user = Auth::user();

        $this->is_first_generation = $user->magisProgram?->is_first_generation;

        foreach($user->students as  $i => $student)
        {
            $s = $i+1;
            if($student->magisProgramItem)
            {
                $this->{"s{$s}_interested"} = $student->magisProgramItem->is_interested;
            }
        }

    }

    public function getMagisProgramForm()
    {
        $items = [];

        foreach(Auth::user()->students as $i => $student)
        {
            $s = $i+1;
            $items[] = Radio::make("s{$s}_interested")
                ->label("S{$s} - $student->first_name")
                ->boolean();
        }


        return [
            Section::make('Magis Program')
                ->schema([
                    Placeholder::make('')
                        ->content(new HtmlString('
                            <p>The Magis High School Program is an academic, social and cultural support program for highly motivated students that are underrepresented at St. Ignatius and institutions of higher education.  The Magis Program exists to aid students and families, offering support in navigating the college preparatory system through various workshops, college tours, identity formation experiences and community programming throughout the duration of the high school experience.</p>
                            <p class="mt-3">The Magis Program supports St. Ignatius students who identity with at least one of the following criteria:</p>
                            <ul class="list-disc">
                            <li>- Students who are first-generation college-bound (neither parent holds a bachelor’s degree from a US college or university)</li>
                            <li>- Students receiving financial assistance</li>
                            <li>- Students of color historically underrepresented in higher education</li>
                            </ul>
                        ')),
                    Radio::make('is_first_generation')
                        ->label(fn () => new HtmlString('
                            <p class="font-bold text-red-700">Are you a first-generation college-bound student?</p>
                            <p class="mt-2">(neither parent holds a bachelor`s degree from a US college or university)</p>
                        '))
                        ->required()
                        ->boolean(),
                    Fieldset::make('Are you interested in joining the Magis Program at this time?')
                            ->columns(3)
                            ->label(fn () => new HtmlString('
                            <p class="font-bold text-red-700">Are you interested in joining the Magis Program at this time?</p>
                            <p class="mt-2">(If yes, more information about the program and the Magis First-Year Student Retreat will be emailed to you.)</p>
                        '))
                        ->schema($items)

                ])
            
        ];
    }

    public function saveMagisProgram()
    {
        $user = Auth::user();

        # Update Magis Program Instance
        if($user->magisProgram){
            $user->magisProgram()->update([
                'is_first_generation' => $this->is_first_generation
            ]);
        }
        # Create
        else{
            $user->magisProgram()->create([
                'is_first_generation' => $this->is_first_generation
            ]);
        }

        $magisProgram = $user->magisProgram;

        foreach(Auth::user()->students as $i => $student)
        {
            $s = $i+1;

            $is_interested_field = "s{$s}_interested";

            $magisProgramItem = $student->magisProgramItem;

            if($magisProgramItem){
                $magisProgramItem->update([
                    'is_interested' => $this->$is_interested_field
                ]);
            }else{
                $student->magisProgramItem()->create([
                    'student_id' => $student->id,
                    'is_interested' => $this->$is_interested_field
                ]);
            }
        }

        
    }
}