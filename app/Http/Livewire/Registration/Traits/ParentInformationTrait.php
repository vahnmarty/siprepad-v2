<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Address;
use App\Models\Parents;
use App\Enums\ParentType;
use App\Enums\SuffixOption;
use App\Enums\SalutationType;
use App\Enums\LivingSituationType;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait ParentInformationTrait{

    private $single_columns = [
        'relationship', 'salutation', 'first_name', 'middle_name', 'last_name', 'suffix', 'address_id', 'mobile_phone', 'email', 'alternate_email', 'employer', 'job_title', 'work_phone', 'high_school_attended', 'living_situation'
    ];

    private $max = 2;

    public $p1_id, $p1_enable = true, $p1_relationship, $p1_salutation, $p1_first_name, $p1_middle_name, $p1_last_name, $p1_suffix, $p1_address_id, $p1_mobile_phone, $p1_email, $p1_alternate_email, $p1_employer, $p1_job_title, $p1_work_phone, $p1_high_school_attended, $p1_living_situation;

    public $p2_id, $p2_enable, $p2_relationship, $p2_salutation, $p2_first_name, $p2_middle_name, $p2_last_name, $p2_suffix, $p2_address_id, $p2_mobile_phone, $p2_email, $p2_alternate_email, $p2_employer, $p2_job_title, $p2_work_phone, $p2_high_school_attended, $p2_living_situation;


    public function mountParents()
    {
        $user = Auth::user();
        $parents = $user->parents;

        foreach(range(1, $this->max) as $p)
        {
            if(!empty($parents[$p-1]))
            {
                # Parent $parent
                $parent = $parents[$p-1];

                # Enable/Disable
                $fieldToggle = "p{$p}_enable";
                $this->$fieldToggle = true;
                
                # Mount parent->id
                $fieldId = "p{$p}_id";
                $this->$fieldId = $parent->id;

                # Data fill
                foreach($this->single_columns as $column)
                {
                    $field = "p{$p}_" . $column;
                    $this->$field = $parent->$column;
                }
            }
        }

    }

    public function getParentsForm()
    {
        $tabs = [];

        foreach(range(1,$this->max) as $p)
        {
            $tab = Tab::make('Parent ' . $p)
                ->icon('heroicon-s-user') 
                ->columns(2)
                ->schema([
                    Hidden::make("s{$p}_id"),
                    Toggle::make("s{$p}_enable")->label("Enable Parent {$p}?")->reactive(),
                    Section::make("Parent {$p}")
                        ->columns(2)
                        ->visible(fn(Closure $get) => $get("s{$p}_enable") === true )
                        ->schema([
                            Select::make("p{$p}_relationship")
                                ->label('Relationship')
                                ->options(ParentType::asSelectArray())
                                ->required(),
                            Select::make("p{$p}_salutation")
                                ->label('Salutation')
                                ->options(SalutationType::asSelectArray())
                                ->required(),
                            TextInput::make("p{$p}_first_name")
                                ->label('First Name')
                                ->required(),
                            TextInput::make("p{$p}_middle_name")
                                ->label('Middle Name'),
                            TextInput::make("p{$p}_last_name")
                                ->label('Last Name')
                                ->required(),
                            Select::make("p{$p}_suffix")
                                ->label('Suffix')
                                ->options(SuffixOption::asSelectArray()),
                            Select::make("p{$p}_address_id")
                                ->label('Address Location')
                                ->required()
                                ->options(Address::get()->pluck('address_type', 'id')),
                            TextInput::make("p{$p}_mobile_phone")
                                ->label('Mobile Phone')
                                ->tel()
                                ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                                ->required(),
                            TextInput::make("p{$p}_email")
                                ->label('Preferred Email Address')
                                ->required()
                                ->email(),
                            TextInput::make("p{$p}_alternate_email")
                                ->label('Alternate Email Address')
                                ->email(),
                            TextInput::make("p{$p}_employer")
                                ->label('Employer'),
                            TextInput::make("p{$p}_job_title")
                                ->label('Job Title'),
                            TextInput::make("p{$p}_work_phone")
                                ->label('Work Phone')
                                ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                                ->tel(),
                            Textarea::make("p{$p}_high_school_attended")
                                ->label('High School Attended')
                                ->required()
                                ->columnSpan('full'),
                            Radio::make("p{$p}_living_situation")
                                ->label('Living Situation')
                                ->options(LivingSituationType::asSelectArray())
                                ->required()
                            
                        ])
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Parent Heading')->tabs($tabs);
    }

    public function saveParents()
    {
        $user = Auth::user();

        foreach(range(1, $this->max) as $p)
        {
            $enable = "p{$p}_enable";

            if($this->$enable)
            {
                $data = [];

                foreach($this->single_columns as $column)
                {
                    $field = "p{$p}_" . $column;
                    $data[$column] = $this->$field;
                }


                $parent_id = "p{$p}_id";

                if($this->$parent_id){
                    $parent = Parents::find($this->$parent_id);
                    $parent->update($data);
                }else{
                    $user->parents()->create($data);
                }
            }
            
        }
    }
}