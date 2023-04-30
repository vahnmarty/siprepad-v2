<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class RegistrationComplete extends Component
{
    public $school_year = '2023-2024';

    public function render()
    {
        return view('livewire.registration-complete')->layout('layouts.linear');
    }

    public function mount()
    {
        $this->students = Auth::user()->students;
    }
}
