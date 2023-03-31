<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
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
        $tabs = [];
        foreach(range(1,3) as $s)
        {
            $tab = Tab::make('Student ' . $s)
                ->icon('heroicon-o-user') 
                ->schema([
                    TextInput::make('name')
                ]);

            $tabs[] = $tab;
        }
        return [
            Tabs::make('Heading')->tabs($tabs)
        ];
    }
}
