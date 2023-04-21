<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait ParentInformationTrait{


    public function mountParents()
    {
        $user = Auth::user();

    }

    public function getParentsForm()
    {
        $tabs = [];

        foreach(range(1,3) as $p)
        {
            $tab = Tab::make('Parent ' . $p)
                ->icon('heroicon-s-user') 
                ->columns(2)
                ->schema([]);

            $tabs[] = $tab;
        }

        return Tabs::make('Parent Heading')->tabs($tabs);
    }

    public function saveParents()
    {

    }
}