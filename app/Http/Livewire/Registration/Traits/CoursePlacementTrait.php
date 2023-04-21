<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Health;
use App\Models\Address;
use App\Enums\AddressType;
use App\Enums\LanguageOption;
use App\Enums\RelationshipType;
use App\Models\EmergencyContact;
use App\Enums\LanguageLevelOption;
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
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput\Mask;

trait CoursePlacementTrait{

    public $p1_english_placement, $p1_math_placement, $p1_reserve_math_challenge, $p1_language1, $p1_language2, $p1_language3, $p1_language4, $p1_reserve_language_challenge, $p1_language_challenge, $p1_language_levels;

    public $p2_english_placement, $p2_math_placement, $p2_reserve_math_challenge, $p2_language1, $p2_language2, $p2_language3, $p2_language4, $p2_reserve_language_challenge, $p2_language_challenge, $p2_language_levels;

    public $p3_english_placement, $p3_math_placement, $p3_reserve_math_challenge, $p3_language1, $p3_language2, $p3_language3, $p3_language4, $p3_reserve_language_challenge, $p3_language_challenge, $p3_language_levels;



    public function mountCoursePlacement()
    {
        $user = Auth::user();
    }

    public function getCoursePlacementForm()
    {
        $tabs = [];

        foreach(Auth::user()->students as $i =>  $student)
        {
            $s = $i+1;
            
            $tab = Tab::make('Student ' . $s)
                ->icon('heroicon-s-user')
                ->columns(1)
                ->schema([
                    Placeholder::make('English Placement')
                        ->content(new HtmlString('
                            <p class="mt-4">You have been placed in:<strong>{Language Here}</strong></p>
                            <div class="mt-4">
                                <strong>NOTE</strong>:  Any interested freshman students will have an opportunity to apply for Honors English in the spring semester of their freshman year for the following school year (sophomore year).
                            </div>
                        ')),
                    Placeholder::make('Math Placement')
                        ->content(new HtmlString('
                            <p class="mt-4">You have been placed in:<strong>{Math Here}</strong></p>
                            <div class="mt-4">
                                If you want to challenge your math placement, you are required to take the Challenge Test on April 22, 2022..
                            </div>
                        ')),
                    Radio::make('reserve_math_challenge')
                        ->label('Do you want to make a reservation to take the Math Challenge Test on April 22,2023?')
                        ->boolean()
                        ->required(),
                    Fieldset::make('Language Selection')
                        ->schema([
                            Placeholder::make('')
                                ->columnSpan('full')
                                ->content(new HtmlString('
                                <p><strong class="text-danger">Please indicate your language choice in the text boxes below</strong>: Options are French, Latin, Mandarin and Spanish
                                (NOTE:  French is not for beginners.  You will need to take a Placement Test to take the class.</p>')),
                            TextInput::make('language1')
                                ->label('First Choice')
                                ->inlineLabel(),
                            TextInput::make('language2')
                                ->label('Second Choice')
                                ->inlineLabel(),
                            TextInput::make('language4')
                                ->label('Third Choice')
                                ->inlineLabel(),
                            TextInput::make('language4')
                                ->label('Fourth Choice')
                                ->inlineLabel(),
                            Placeholder::make('')
                                ->columnSpan('full')
                                ->content(new HtmlString('<p>To place in a more advanced section of your language choice than beginning level, you are required to take a Language Placement Test on April 22, 2022.</p>')),
                            Radio::make('reserve_language_challenge')
                                ->label('Do you want to make a reservation to take the Language Placement Test on April 22,2023')
                                ->boolean()
                                ->columnSpan('full')
                                ->required(),
                            Select::make('language_challenge')
                                ->options(LanguageOption::asSelectArray())
                                ->columnSpan('full'),
                            CheckboxList::make('language_levels')
                                ->label('Check ALL that apply to your number 1 ranked language choice')
                                ->options(LanguageLevelOption::asArray())
                        ])
                    
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Accomodations')->tabs($tabs);
    }

    public function saveCoursePlacement()
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