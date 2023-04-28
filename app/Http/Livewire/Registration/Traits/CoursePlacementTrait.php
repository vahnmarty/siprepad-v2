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

    public $s1_english_placement, $s1_math_placement, $s1_reserve_math_challenge, $s1_language1, $s1_language2, $s1_language3, $s1_language4, $s1_reserve_language_challenge, $s1_language_challenge, $s1_language_levels;

    public $s2_english_placement, $s2_math_placement, $s2_reserve_math_challenge, $s2_language1, $s2_language2, $s2_language3, $s2_language4, $s2_reserve_language_challenge, $s2_language_challenge, $s2_language_levels;

    public $s3_english_placement, $s3_math_placement, $s3_reserve_math_challenge, $s3_language1, $s3_language2, $s3_language3, $s3_language4, $s3_reserve_language_challenge, $s3_language_challenge, $s3_language_levels;

    private $placement_columns = [    'english_placement',    'math_placement',    'reserve_math_challenge',    'language1',    'language2',    'language3',    'language4',    'reserve_language_challenge',    'language_challenge'];

    private $placement_multiple_columns = ['language_levels'];



    public function mountCoursePlacement()
    {
        $user = Auth::user();

        foreach($user->students as $i => $student)
        {
            $s = $i+1;

            foreach($this->placement_columns as $column)
            {
                $this->{"s{$s}_" . $column} = $student->coursePlacement?->$column;
            }

            foreach($this->placement_multiple_columns as $column)
            {
                $field = "s{$s}_" . $column;
                $this->$field = explode(',', $student->coursePlacement?->$column);
                
            }
            
        }
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
                    Placeholder::make('')
                        ->content(new HtmlString('<h3 class="font-bold">Student '. $s .' - '. $student->first_name .'</h3>')),
                    Fieldset::make('English Placement')
                        ->columns(1)
                        ->schema([
                            Placeholder::make('')
                            ->content(new HtmlString('
                                <p>You have been placed in:<strong>{Language Here}</strong></p>
                                <div class="p-1 mt-4 bg-warning-2">
                                    <strong>NOTE</strong>:  Any interested freshman students will have an opportunity to apply for Honors English in the spring semester of their freshman year for the following school year (sophomore year).
                                </div>
                            ')),
                    ]),

                    Fieldset::make('Math Placement')
                        ->columns(1)
                        ->schema([
                            Placeholder::make('')
                                ->content(new HtmlString('
                                <p>You have been placed in:<strong>{Math Here}</strong></p>
                                <div class="mt-4">
                                    If you want to challenge your math placement, you are required to take the Challenge Test on April 22, 2022..
                                </div>
                            ')),

                            Radio::make("s{$s}_reserve_math_challenge")
                                ->label('Do you want to make a reservation to take the Math Challenge Test on April 22,2023?')
                                ->boolean()
                                ->required(),
                    ]),
                    
                    Fieldset::make('Language Selection')
                        ->schema([
                            Placeholder::make('')
                                ->columnSpan('full')
                                ->content(new HtmlString('
                                <p><strong class="text-danger">Please indicate your language choice in the text boxes below</strong>: Options are French, Latin, Mandarin and Spanish
                                (NOTE:  French is not for beginners.  You will need to take a Placement Test to take the class.</p>')),
                            TextInput::make("s{$s}_language1")
                                ->label('First Choice')
                                ->inlineLabel(),
                            TextInput::make("s{$s}_language2")
                                ->label('Second Choice')
                                ->inlineLabel(),
                            TextInput::make("s{$s}_language3")
                                ->label('Third Choice')
                                ->inlineLabel(),
                            TextInput::make("s{$s}_language4")
                                ->label('Fourth Choice')
                                ->inlineLabel(),
                            Placeholder::make('')
                                ->columnSpan('full')
                                ->content(new HtmlString('<p class="p-1 bg-warning-2"><strong>NOTE:</strong>To place in a more advanced section of your language choice than beginning level, you are required to take a Language Placement Test on April 22, 2022.</p>')),
                            Radio::make("s{$s}_reserve_language_challenge")
                                ->label('Do you want to make a reservation to take the Language Placement Test on April 22,2023')
                                ->boolean()
                                ->columnSpan('full')
                                ->required(),
                            Select::make("s{$s}_language_challenge")
                                ->label('What Language?')
                                ->options(LanguageOption::asSelectArray())
                                ->columnSpan('full')
                                ->required(),
                            CheckboxList::make("s{$s}_language_levels")
                                ->label('Check ALL that apply to your number 1 ranked language choice')
                                ->options(LanguageLevelOption::asSameArray())
                        ])
                    
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Course Placements')->tabs($tabs);
    }

    public function saveCoursePlacement()
    {
        $user = Auth::user();
        $students = $user->students;

        foreach($students as $i => $student)
        {
            $s = $i+1;
            $data = [];

            foreach($this->placement_columns as $column)
            {
                $field = "s{$s}_" . $column;
                $data[$column] = $this->$field;
            }

            foreach($this->placement_multiple_columns as $column)
            {
                $field = "s{$s}_" . $column;

                
                if(is_array($this->$field)){
                    array_filter($this->$field);
                    
                    $data[$column] = implode($this->$field);
                }
            }

            if($student->coursePlacement){
                $student->coursePlacement()->update($data);
            }else{
                $data['user_id'] = $user->id;
                $student->coursePlacement()->create($data);
            }
        }
    }
}