<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use App\Models\Department;

class TheWorkingGroup extends Component
{
    public $departments = [];
    
    public function render()
    {
        return view('livewire.settings.the-working-group');
    }

    public function mount()
    {
        $this->departments = Department::get();
    }

    public function getDirectories()
    {
        return [];
    }
}
