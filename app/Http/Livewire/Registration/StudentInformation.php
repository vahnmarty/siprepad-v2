<?php

namespace App\Http\Livewire\Registration;

use App\Models\Student;
use Livewire\Component;
use App\Enums\SuffixOption;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;

class StudentInformation extends Component implements HasForms
{
    use InteractsWithForms;
    
    public function render()
    {
        return view('livewire.registration.student-information');
    }

    protected function getFormSchema(): array
    {   
        return [
            TextInput::make('first_name')->required(),
            TextInput::make('middle_name'),
            TextInput::make('last_name')->required(),
            Select::make('suffix')->options(SuffixOption::asArray()),
            TextInput::make('preferred_first_name'),
            DatePicker::make('birthdate')
        ];
    }

    public function getStudentForm()
    {
        $tabs = [];

        foreach(range(1,3) as $s)
        {
            $tab = Tab::make('Student ' . $s)
                ->icon('heroicon-s-user') 
                ->columns(2)
                ->schema([
                   
                ]);

            $tabs[] = $tab;
        }

        return Tabs::make('Student Heading')->tabs($tabs);
    }
}
