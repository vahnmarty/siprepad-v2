<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class TheWorkingGroup extends Component
{
    public $members = [];
    
    public function render()
    {
        return view('livewire.settings.the-working-group');
    }

    public function mount()
    {
        $this->members = $this->getDirectories();
    }

    public function getDirectories()
    {
        return [];
    }
}
